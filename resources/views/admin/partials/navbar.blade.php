<nav class="bg-gray-800 shadow px-6 py-4">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-lg font-bold text-white">PWT UNDERCOVER</div>
        <div>
            <form action="{{route('logout')}}" method="POST">
                @csrf
                @method('post')
               <button type="submit" class="text-red-500 hover:text-red-800 ">logout</button>
            </form>
        </div>
    </div>
</nav>
