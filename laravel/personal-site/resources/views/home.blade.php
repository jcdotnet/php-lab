<x-layout>
    <section>
        <div class="row flex h-[calc(100vh-65px)] flex-col items-center justify-center text-center">
            <h1 class="text-4xl md:text-5xl font-extralight">
                <span class="tracking-wider text-gray-400">Hello, I'm a</span>
                <strong class="block font-extrabold py-2 md:py-5">
                    <span class="block">Computer Scientist</span> 
                    <span class="text-3xl">&</span>
                    <span class="block">Software Engineer</span>    
                </strong> 
            </h1>
            <div class="text-3xl tracking-wide text-gray-400">who knows about</div>
            <div id="typewriter" class="hidden">
                @foreach ($skills as $skill)
                    <p>{{ strtoupper($skill['name']) }}</p> 
                @endforeach
            </div>
            <div class="text-2xl md:text-4xl text-accent my-5 font-bold">_</div> 
        </div>   
    </section>
    <section class="bg-sky-50">
        <div class="row">
            <h2>About Me</h2>
            <p>
                Skilled Computer Scientist with expertise in software development and passionate about creating robust applications. 
                Proficient in <strong>C++, C#, Java, PHP and JavaScript</strong>, 
                while being able to easily switch to other programming languages if needed.
            </p>
        </div>
    </section>
    <section>
        <div class="row">
            <div class="progress flex flex-col items-center my-6">
                <x-clock/>
                <h2>Website In Progress</h2>
                <p>
                    Coming soon! In the meantime you can play <a href="https://minesweeper.josecarlosroman.com">minesweeper</a> :)
                </p>
            </div>
        </div>
    </section>
</x-layout>