<div class="max-w-7xl mx-auto p-8">
    <h1 class="text-2xl font-bold mb-6">Create new job posting</h1>

    <div class="grid grid-cols-3 gap-6">
        <!-- Job Details Section -->
        <div class="col-span-2 bg-white shadow rounded-lg p-6">
            <h2 class="text-lg font-semibold mb-4">Job details</h2>
            <form wire:submit.prevent="save" class="space-y-4 flex flex-col justify-between h-full">
                <div>
                    <label class="block font-medium">Title</label>
                    <input type="text" wire:model="title" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Job posting title" />
                    @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium">Description</label>
                    <textarea wire:model="description" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Job posting description"></textarea>
                    @error('description') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Experience</label>
                        <input type="text" wire:model="experience" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Eg. 1-3 Yrs" />
                        @error('experience') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block font-medium">Salary</label>
                        <input type="text" wire:model="salary" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Eg. 2.75-5 Lacs PA" />
                        @error('salary') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Location</label>
                        <input type="text" wire:model="location" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Eg. Remote / Pune" />
                        @error('location') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block font-medium">Extra Info</label>
                        <input type="text" wire:model="extra_info" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Eg. Full Time, Urgent, Part Time, Flexible" />
                        @error('extra_info') <span class="text-red-500">{{ $message }}</span> @enderror
                    </div>
                </div>

                <!-- Save Button -->
                <div class="mt-auto">
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg shadow hover:bg-blue-600">Save</button>
                </div>
            </form>
        </div>

        <!-- Company and Skills Section -->
        <div class="space-y-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Company details</h2>
                <div>
                    <label class="block font-medium">Name</label>
                    <input type="text" wire:model="company_name" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" placeholder="Company Name" />
                    @error('company_name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block font-medium">Logo</label>
                    <input type="file" wire:model="logo" class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200" />
                    @error('logo') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-lg font-semibold mb-4">Skills</h2>
                <div>
                    <label class="block font-medium">Name</label>
                    <select wire:model="skills" multiple class="w-full border-gray-300 rounded-md p-2 focus:ring focus:ring-blue-200">
                        <option value="Laravel">Laravel</option>
                        <option value="Inertia">Inertia</option>
                        <option value="Vue">Vue</option>
                        <option value="Tailwind">Tailwind</option>
                        <option value="react">React</option>
                    </select>
                    @error('skills') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="mt-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif
</div>
