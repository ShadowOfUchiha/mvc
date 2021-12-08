<!-- read.php that gets requested without meta data so it wont duplicate inside the reads.php -->
<span class="my-16">
    <h1 class="text-5xl">Read products</h1>
</span>
<span class="flex flex-row justify-between">
    <form id="searchform">
        <input name="term" type="text" placeholder="Search product..." class="border border-black p-2 m-2">
        <!-- <a/> element instead of <button/> so it wont refresh onclick -->
        <a href="#" onclick="submitForm('searchform', 'index.php?action=search', sendToContent)"><span class="material-icons material-icons-outlined">search</span></a>
    </form>
    <button class="p-2 m-2 bg-blue-500 text-white rounded" onclick="loadPage('index.php?action=createform', sendToContent)">Create product</button>
</span>

<span class="flex justify-center w-full">
<?php echo $table; ?>
</span>
