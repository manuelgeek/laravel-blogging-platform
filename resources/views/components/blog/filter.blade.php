<div class="flex items-center justify-end">
    <div>
        <select id="filter" name="filter" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" onchange="selectChangedTrigger(this)">
            <option value="latest" @selected(request()->filter === 'latest')>Latest</option>
            <option value="oldest" value="latest" @selected(request()->filter === 'oldest')>Oldest</option>
        </select>
    </div>
</div>
<script>
    function selectChangedTrigger (obj) {
        // console.log(obj.value)
        document.location.href = "?filter=" + obj.value // refresh the page with new url
    }
</script>
