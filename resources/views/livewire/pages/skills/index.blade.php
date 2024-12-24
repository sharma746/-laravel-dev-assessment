<div class="flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8">
    <!-- Skills Table -->
    <div class="w-full md:w-1/2">
        <h1 class="text-2xl font-bold mb-4">Skills</h1>
        <table class="min-w-full bg-white shadow rounded">
            <thead>
                <tr class="text-left border-b">
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $skill->name }}</td>
                        <td class="px-4 py-2 space-x-4">
                            <button wire:click="edit({{ $skill->id }})" class="text-blue-500">Edit</button>
                            <button wire:click="delete({{ $skill->id }})" class="text-red-500">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add/Edit Form -->
    <div class="w-full md:w-1/2 bg-white shadow rounded p-4">
        <h1 class="text-2xl font-bold mb-4">{{ $skillId ? 'Edit' : 'Add New' }} Skill</h1>
        <form wire:submit.prevent="save">
            <div class="mb-4">
                <label for="name" class="block font-medium">Name</label>
                <input wire:model="name" type="text" id="name" class="w-full border rounded px-4 py-2">
                @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ $skillId ? 'Update' : 'Save' }}</button>
        </form>
    </div>
</div>
