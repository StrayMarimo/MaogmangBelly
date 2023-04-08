$(document).ready(function () {
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

    // On edit category button click
    $(".btn.category-edit").click(function () {
       // get id of element
        let categoryId = $(this).attr('id').substring(9);

        // Call the function with the retrieved parameter
        editCategory(categoryId);
    });

    // On delete category button click
    $(".btn.category-delete").click(function () {
        // Get the value of the "data-category-buttons" attribute from category-buttons
        let categoryId = $(this).attr("id").substring(11);
        console.log("delete: " + categoryId);
    
        // Call the function with the retrieved parameter
        deleteCategory(categoryId);
    });


    // edit category
    function editCategory(id) {
        console.log("editing : " + id);
        $("#cat-edit").val(id);
        let catInput = $("#tab-" + id);
        if ($("i#cat-icon-" + id).hasClass("bi-pencil-fill")) {
            $("i#cat-icon-" + id)
                .removeClass("bi-pencil-fill")
                .addClass("bi-check2-square");
            catInput.removeAttr("readonly");
            catInput.css("border", "solid 1px black");
        } else {
            $("i#cat-icon-" + id)
                .removeClass("bi-check2-square")
                .addClass("bi-pencil-fill");
            catInput.attr("readonly", true);
            catInput.css("border", "none");
            $("#form-"+id).submit();
        }
    }

    function deleteCategory(id) {
        console.log("deleted");
        $(".delete-category-tab").val(id);
        $("#form-" + id).submit();
    }
});
