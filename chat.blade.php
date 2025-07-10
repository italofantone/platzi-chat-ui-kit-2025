<div>
    <div class="space-y-4 mb-4">
    @foreach($messages as $message)
        @if($message['role'] === 'user')
            <div class="flex justify-end">
                <div class="bg-green-500 text-gray-900 rounded-lg rounded-tr-none p-4 max-w-md">
                    {{ $message['content'] }}
                </div>
            </div>
        @endif

        @if($message['role'] === 'assistant')
            <div class="bg-gray-900 text-gray-200 rounded-lg rounded-tl-none p-4 max-w-md">
                {{ $message['content'] }}
            </div>
        @endif
    @endforeach
    </div>

    <form wire:submit="send" class="bg-gray-900 rounded-lg p-2 flex">
        <input wire:model="content" type="text" class="w-full outline-none text-gray-200 px-2" placeholder="Escribe aquí..." required>
        <button type="submit" class="bg-green-500 text-gray-900 px-4 py-2 rounded cursor-pointer hover:bg-green-600 transition-colors">
            Preguntar
        </button>
    </form>
</div>
