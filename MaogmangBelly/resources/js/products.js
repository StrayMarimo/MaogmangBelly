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

     // Handle clicks on the add product nav item 
   $('.edit-product').on('click', function(e){
        e.preventDefault();

        console.log("editproduct");
        let product_id = $(this).data("product-id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/products/product?id=' + product_id,
            method: 'GET',
            success: function(response) {
                let product = response;
                console.log("dddd: " + product['category_id']);

                populateParentCategorySelect('#editProductForm #selectCategoryUpdate', product['category_id']);
                $('#editProductForm #productId').val(product['id']); 
                $('#editProductForm #productCategoryId').val(product['category_id']);
                $('#editProductForm #name').val(product['name']);
                $('#editProductForm #description').val(product['description']);
                $('#editProductForm #preview-image-before-upload').attr('src', "/assets/product_assets/" + product['gallery']);
                $('#editProductForm #price').val(product['price']);
                $('#editProductForm #price10').val(product['price_10pax']);
                $('#editProductForm #price20').val(product['price_20pax']);
                $('#editProductForm #stock').val(product['stock']);
                $('#editProductForm #isFeatured').prop("checked", product['is_featured']);
                $('#editProductForm #isTrending').prop("checked", product['is_trending']);
                $('#editProductModal').modal('show');
               
                
            },
            error: function(xhr) {
                console.log(xhr.responseText);
            }
        });

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
        populateParentCategorySelect('#parentCategory', 0);
    });

    // handles instance when delete category modal is shown
    $('#deleteCategoryModal').on('show.bs.modal', function() {
        populateParentCategorySelect('#selectCategory', 0);
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
    function populateParentCategorySelect(selectCategoryId, defaultValue) {
        console.log("populating categories options");
        let $parentCategorySelect = $(selectCategoryId);
       
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/categories',
            method: 'GET',
            success: function(response) {
                let categories = response;

                if(defaultValue == 0)
                    $parentCategorySelect.empty().append("<option value=''> Select Category </option>");
                else
                {
                    $.each(categories, function (index, category) {
    
                        if (category["id"] == defaultValue)
                        {
                            $parentCategorySelect.empty().append($('<option>', {
                                value: category['id'],
                                text: category['name'] 
                            }));
                            categories.splice(index, 1);
                        }
                    })
                    
                }
                  
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
