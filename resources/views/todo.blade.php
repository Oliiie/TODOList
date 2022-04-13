<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('TODOList') }}
      </h2>
    </x-slot>
  
    <div class="py-12" style="background-color: black">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="background-color: black">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div style="height:60vh;display:flex;flex-direction:column;background-color:lightblue" class="p-6 bg-white border-b border-gray-200">
            <div id="poruke" style="flex-grow:1;margin:20px">
              <h2>TODO List:</h2>
              <ul>
                @foreach($sadrzaji as $sadrzaj)
                <li>{{$sadrzaj->name}} - {{$sadrzaj->sadrzaj}} -
                  <form style="display: inline-block" action="{{ route('todo.destroy', $sadrzaj->id) }}" method="POST">
                        @csrf
                            @method('DELETE')
                        <button title="Delete" style="font-style: oblique">Delete</button>
                  </form>
                </li>
                @endforeach
              </ul>
            </div>
            <form style="flex-grow:0;margin:20px;" method="POST" action={{route('todo.store')}}>
              @csrf
              <input type="text" name="sadrzaj" />
              <input type="submit" value="Dodaj na listu" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>