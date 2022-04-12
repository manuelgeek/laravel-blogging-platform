<div class="overflow-x-hidden bg-gray-100 py">
    <div class="px-6 py-8">
        <div class="container flex justify-between mx-auto">
            <div class="w-full lg:w-8/12">
                {{$slot}}
            </div>
            <div class="hidden w-4/12 -mx-8 lg:block">
                {{$sidebar}}
            </div>
        </div>
    </div>
</div>
