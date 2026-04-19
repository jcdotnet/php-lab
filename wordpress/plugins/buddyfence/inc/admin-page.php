<?php

if ( ! defined( 'ABSPATH' ) ) exit;

function buddyfence_admin_page() { ?>

    <div class="wrap">     

        <h2> Buddyfence </h2>        
        
        <?php $options = buddyfence_get_components_options(); ?>         
        
        <form action="options.php" method="post">  
            <?php       
                settings_fields( 'buddyfence_plugin_options' ); 
            ?>
            
            <table class="form-table">			
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="components"><?php _e('Restrict not logged-in users from accessing these pages:', 'buddyfence') ?></label>
                        </th>
                        <td id="components">
                            <ul>                                
                                <?php $bp = buddypress(); ?>
                                <?php foreach ($bp->active_components as $key => $value): ?>
                                    <?php if ($key != 'blogs' && $key!='xprofile' && $key!='settings' && $key!='friends' && $key!='messages' && $key!='notifications'): ?> 
                                        <li>
                                            <label>
                                                <input type="checkbox" name="buddyfence_components_options[components][]" value="<?php echo esc_attr( $key ); ?>" 
                                                <?php checked( in_array( $key, $options['components'] ), true ) ?>> <?php buddyfence_get_component_name($key); ?>
                                            </label>
                                        </li>
                                     <?php endif;  ?> 
                                <?php endforeach;  ?>
                                <li>
                                    <label>
                                        <input type="checkbox" name="buddyfence_components_options[components][]" value="user_page" 
                                        <?php checked( in_array( 'user_page', $options['components'] ), true ) ?>> <?php _e('User pages', 'buddyfence'); ?>
                                    </label>
                                </li>
                            </ul>                            					
                        </td>				
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="redirection"><?php _e('Where not logged-in users will be redirected to?:', 'buddyfence') ?></label>	
                        </th>
                        <td id="redirection">
                            <label><input type="radio" name="buddyfence_components_options[redirection]" value="login-back" <?php checked($options['redirection'], "login-back"); ?>>&nbsp;<?php _e('Login page. Upon logging in, they will be sent directly to the page they were originally trying to access', 'buddyfence'); ?></label>
                            <p><label><input type="radio" name="buddyfence_components_options[redirection]" value="login" <?php checked($options['redirection'], "login"); ?>> <?php _e('Login page. Upon logging in, they will be sent directly to the home page', 'buddyfence'); ?></label> </p> 
                            <p><label><input type="radio" name="buddyfence_components_options[redirection]" value="home" <?php checked($options['redirection'], "home"); ?>> <?php _e('Home page', 'buddyfence'); ?></label> </p>
                            <p>
                                <label><input type="radio" name="buddyfence_components_options[redirection]" value="custom" <?php checked($options['redirection'], "custom"); ?>> <?php _e('WordPress Page:', 'buddyfence'); ?></label>     
                                <?php 
                                    $pages = get_posts(array('post_type' => 'page', 'numberposts' => -1, 'orderby' => 'name', 'order' => 'asc'));
                                ?>                                                                                                                    					                           
                                <select id="pages" name="buddyfence_components_options[custom_page]">             
                                    <?php foreach ($pages as $page): ?> 
                                        <option value="<?php echo $page->ID ?>" <?php selected( $page->ID, $options['custom_page'] ) ?> > <?php echo $page->post_title ?></option>
                                    <?php endforeach;  ?>
                                </select>
                            </p>  
                            <p>
                                <label><input type="radio" name="buddyfence_components_options[redirection]" value="url" <?php checked($options['redirection'], "url"); ?>> <?php _e('Custom URL:', 'buddyfence'); ?></label>     
                                <input type="text" name="buddyfence_components_options[custom_url]" value="<?php echo $options['custom_url']; ?>">                                                                                                       					                           
                            </p>                                                                                                                      					
                        </td>
                        				
                    </tr>
                </tbody>  
            </table>
            
            <hr> 
            
            <table class="form-table">			
                <tbody>
                    <tr>
                        <th scope="row">
                            <label for="template-instead"><?php _e('Display a message with a link to the login page instead?', 'buddyfence'); ?></label>
                        </th>
                        <td id="template-instead">                         
                            <label><input type="radio" name="buddyfence_components_options[use_template]" value="1" <?php checked($options['use_template'], "1"); ?>>&nbsp;<?php _e('Yes', 'buddyfence'); ?></label>
                            <p><label><input type="radio" name="buddyfence_components_options[use_template]" value="0" <?php checked($options['use_template'], "0"); ?>> <?php _e('No'); ?></label> </p>     
                            <p class="description"><?php _e('Upon logging in, they will be sent directly to the page they were originally trying to access', 'buddyfence'); ?> </p>              
                        </td>	
                    </tr>

                </tbody>  
            </table>
            
            <p class="description"><?php _e('Note: We have provided the <strong>buddyfence-message</strong>, <strong>buddyfence-header</strong> and <strong>buddyfence-message-text</strong> CSS classes so that you can easily style and customize the login template', 'buddyfence'); ?> </p>			             
            
            <?php submit_button(); ?>             
        </form> 
    </div> <!--  wrap --> <?php
    
}