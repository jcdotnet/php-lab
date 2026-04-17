const paragraphs = document.getElementById( 'typewriter' );
const texts = [...paragraphs.children].map( child => child.innerHTML );
const output = paragraphs.nextElementSibling;

let current = []
let text;
let i = 0, isDeleting = false, isEnd;

const getText = () => {
  return texts[Math.floor( Math.random() * texts.length )];
}

const typewriter = () => {	
	
	if (i === 0) {
		text = getText( texts );
	} 

	setTimeout( function () {
		isEnd = false;

    if (isDeleting)
			current.pop();
		else 
			current.push( text.charAt(i) );
    
		i = isDeleting ? i-1 : i+1;
    
 		output.innerHTML = current.join('') + '_';

		if ( i === 0 ) isDeleting = false;
		if ( i === text.length ) { 
			isDeleting = true;
			isEnd = true;
		}

		typewriter();
  
	}, isEnd ? 2000 : ( isDeleting ? 80 : Math.random() * 400 ) );
}

window.onload = () => {
    typewriter();
}