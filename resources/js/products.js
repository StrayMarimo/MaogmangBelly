// Wait for the document to finish loading before executing this code
$(document).ready(function () {
    // Handle clicks on the tabs in the navigation menu
    $(".nav-tabs a").click(function () {
        $(this).tab("show");
    });

    // Select the modal element
    var modal = $(".modal");

    // When the modal is shown
    modal.on("shown.bs.modal", function () {
        // Get the modal dialog element
        var modalDialog = $(this).find(".modal-dialog");

        // Set the flex container and alignment classes
        modalDialog.addClass(
            "d-flex align-items-center justify-content-center"
        );
    });

    // When the modal is hidden
    modal.on("hidden.bs.modal", function () {
        // Remove the flex container and alignment classes
        $(this)
            .find(".modal-dialog")
            .removeClass("d-flex align-items-center justify-content-center");
    });

    // Handle clicks on the "Add Product" button
    $(".btn, .btn-primary, .add-product").click(function() {
        let categoryId = $(this).attr("id").substring(9);
        console.log("adding product on " + categoryId);
        $(".modal-body #prod-cat-id").val(categoryId);
    })
    
    // Handle clicks on the "Edit Category" buttons
    $(".btn.category-edit").click(function () {
        // Get the ID of the category to edit
        let categoryId = $(this).attr('id').substring(9);

        // Call the editCategory function with the retrieved ID as the parameter
        editCategory(categoryId);
    });

    // Handle product image upload
     $('#img').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });

    // Handle clicks on the "Delete Category" buttons
    $(".btn.category-delete").click(function () {
        // Get the ID of the category to delete
        let categoryId = $(this).attr("id").substring(11);
        
        // Call the deleteCategory function with the retrieved ID as the parameter
        deleteCategory(categoryId);
    });

    // Function to handle editing of a category
    function editCategory(id) {
        console.log("editing : " + id);

        // Set the value of the "cat-edit" input field to the ID of the category being edited
        $("#cat-edit").val(id);

        // Get the input field for the category being edited
        let catInput = $("#tab-" + id);

        // Check if the "Edit" button has been clicked
        if ($("i#cat-icon-" + id).hasClass("bi-pencil-fill")) {
            // Change the icon to a "Save" icon and allow the input field to be edited
            $("i#cat-icon-" + id)
                .removeClass("bi-pencil-fill")
                .addClass("bi-check2-square");
            catInput.removeAttr("readonly");
            catInput.css("border", "solid 1px black");
        } else {
            // Change the icon back to an "Edit" icon, prevent further editing of the input field,
            // and submit the form to save the changes
            $("i#cat-icon-" + id)
                .removeClass("bi-check2-square")
                .addClass("bi-pencil-fill");
            catInput.attr("readonly", true);
            catInput.css("border", "none");
            $("#form-"+id).submit();
        }
    }

    // Function to handle deletion of a category
    function deleteCategory(id) {
        console.log("deleted");

        // Set the value of the "delete-category-tab" input field to the ID of the category being deleted
        $(".delete-category-tab").val(id);

        // Submit the form to delete the category
        $("#form-" + id).submit();
    }
});
