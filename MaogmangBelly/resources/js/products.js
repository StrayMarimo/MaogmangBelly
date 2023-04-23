// Wait for the document to finish loading before executing this code
$(document).ready(function () {
    // Handle clicks on the tabs in the navigation menu
    $(".nav-tabs a").click(function () {
        $(this).tab("show");
    });

    // Handle clicks on the add category nav item 
    $('#addCategory').on('click', function(e){
        e.preventDefault();
        $('#addCategoryModal').modal('show');
    });

     // Handle clicks on the delete category nav item 
    $('#deleteCategory').on('click', function(e){
        e.preventDefault();
        $('#deleteCategoryModal').modal('show');
    })


    // Handle clicks on the add product nav item 
   $('#addProduct').on('click', function(e){
        e.preventDefault();
         $('#addProductModal').modal('show');

    });

    // Handle clicks on the delete product nav item 
   $('.delete-product').on('click', function(e){
      e.preventDefault();

        let product_id = $(this).data("product-id");
        let product_name = $(this).data("product-name");
        $('#deleteProductId').val(product_id);

        let modal_text = $('#deleteProductName').text() + " " + product_name + " ?";
        console.log(modal_text);
        $('#deleteProductId').val(product_id);
        $('#deleteProductName').text(modal_text);
        $('#deleteProductModal').modal('show');
    });

    // handles instance when delete product modal is shown
    $('#deleteProductModal').on('show.bs.modal', function() {
        // populateParentCategorySelect('#parentCategory');
    });
   
    
    // handles instance when add product modal is shown
    $('#addProductModal').on('show.bs.modal', function() {
        populateParentCategorySelect('#parentCategory');
    });

    // handles instance when delete category modal is shown
    $('#deleteCategoryModal').on('show.bs.modal', function() {
        populateParentCategorySelect('#selectCategory');
    });

     // handles instance when category is selected on add product modal
    $('#parentCategory').on('change', function(){
        let category_id = $('#parentCategory').val();
        console.log("id: ", category_id )
        $('#product-category-id').val(category_id);
    })

    // handles instance when category is selected on delete category
    $('#selectCategory').on('change', function(){
        let category_id = $('#selectCategory').val();
        console.log("id: ", category_id )
        $('#delete-category-id').val(category_id);
    })

    // Handle product image upload
     $('#img').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    function populateParentCategorySelect(selectCategoryId) {
        console.log("populating categories options");
        var $parentCategorySelect = $(selectCategoryId);
         $parentCategorySelect.empty().append('<option value=""> Select Category </option>');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/categories',
            method: 'GET',
            success: function(response) {
                var categories = response;
                $.each(categories, function () {
                    $parentCategorySelect.append($('<option>', {
                        value: this.id,
                        text: this.name 
                    }));
                    console.log("ID: " + this.id);
                    console.log("Name: " + this.name);
                });
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });
    }
    
   $(".alert .close").click(function() {
    $(this).parent().fadeOut(500);
  });

  setTimeout(function() {
    $(".alert").fadeOut(500);
  }, 5000);
   
});
