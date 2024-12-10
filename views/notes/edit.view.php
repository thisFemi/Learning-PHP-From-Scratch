<?php require base_path("views/partials/head.php")?>

<?php require base_path("views/partials/nav.php")?>
<?php require base_path ("views/partials/banner.php")?>

  <main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
  <div class ="md:grid md:grid-cols-3 md:gap-6">

 
    <form  method="POST" action="/note">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $note['id']?>">
      <p class="mt-1 text-sm/6 text-gray-600">This information will be displayed publicly so be careful what you share.</p>

   
       

        <div class="col-span-full">
          <label for="body" class="block text-sm/6 font-medium text-gray-900">Body</label>
          <div class="mt-2">
            <textarea
    
            id="body" name="body" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" placeholder="Idea for a note...">
        <?= $note['body']?>
        </textarea>
        <?php if(isset($errors['body'])):?>  
            <p class="text-red-500 mt-2 "><?=$errors['body']?></p>
            <?php endif;?>
        </div>
         
     
    </div>

  


  <div class="mt-6 flex items-center justify-end gap-x-6">
    <a  href="/notes"  class="rounded-md border-transparent bg-gray-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">Cancel</a>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
  </div>
</form>

</div>
    </div>
  </main>
  <?php require base_path("views/partials/footer.php")?>


