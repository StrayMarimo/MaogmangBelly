import * as utils from './utils.js';

$(document).ready(function () {
    // Handle clicks on the tabs in the navigation menu
    $('.nav-tabs a').click(function () {
        $(this).tab('show');
    });

    // handle clicks on settings button
    $('#showSettingsBtn').on('click', function (e) {
        e.preventDefault();
        $('#settingsModal').modal('show');
    });

    // handle clicks on add to order button on product details page
    $('#addToOrder').on('click', function (e) {
        e.preventDefault();
        $('#orderType').val('O');
        $('#availProductForm').submit();
    });

    // Handle clicks on the add category btn
    $('#addCategory').on('click', function (e) {
        hideSettingsModal(e);
        $('#addCategoryModal').modal('show');
    });

    // Handle clicks on the delete category btn
    $('#deleteCategory').on('click', function (e) {
        hideSettingsModal(e);
        $('#deleteCategoryModal').modal('show');
    });

    // Handle clicks on the add product nav item
    $('#addProduct').on('click', function (e) {
        hideSettingsModal(e);
        $('#addProductModal').modal('show');
    });

    // Handle clicks on the edit category nav item
    $('#editCategory').on('click', function (e) {
        hideSettingsModal(e);
        $('#editCategoryModal').modal('show');
    });

    // Handle clicks on the edit product icon button
    $('.edit-product').on('click', function (e) {
        e.preventDefault();
        let product_id = $(this).data('product-id');
        populateParentCategorySelect(
            '#editProductForm #selectCategoryUpdate',
            product_id
        );

        let getProductDetails = utils.ajaxParams('/product/' + product_id, 'GET');
        getProductDetails.success = function (response) {
                let product = response;
                let form = '#editProductForm';
                let actionUrl = $(form).attr('action');
                actionUrl = actionUrl.replace('product_id', product_id);
                $(form).attr('action', actionUrl);
                $(form + ' #productId').val(product['id']);
                $(form + ' #productCategoryId').val(product['category_id']);
                $(form + ' #name').val(product['name']);
                $(form + ' #description').val(product['description']);
                $(form + ' #preview-image-before-upload').attr(
                    'src',
                    '/assets/product_assets/' + product['gallery']
                );
                $(form + ' #price').val(product['price']);
                $(form + ' #price10').val(product['price_10pax']);
                $(form + ' #price20').val(product['price_20pax']);
                $(form + ' #stock').val(product['stock']);
                $(form + ' #isFeatured').prop('checked', product['is_featured']);
                $(form + ' #isTrending').prop('checked', product['is_trending']);
                $('#editProductModal').modal('show');
            },
        $.ajax(getProductDetails);
    });

    // Handle clicks on the delete product icon button
    $('.delete-product').on('click', function (e) {
        e.preventDefault();

        let product_id = $(this).data('product-id');
        let product_name = $(this).data('product-name');
        $('#deleteProductId').val(product_id);

        let modal_text = $('#deleteProductName').text() + ' ' + product_name + ' ?';
        let actionUrl = $('#deleteProductForm').attr('action');
        actionUrl = actionUrl.replace('product_id', product_id);
        $('#deleteProductForm').attr('action', actionUrl);
        $('#deleteProductName').text(modal_text);
        $('#deleteProductModal').modal('show');
    });

    // handles instance when add product modal is shown
    $('#addProductModal').on('show.bs.modal', function () {
        populateParentCategorySelect('#parentCategory', 0);
    });

    // handles instance when delete category modal is shown
    $('#deleteCategoryModal').on('show.bs.modal', function () {
        populateParentCategorySelect('#selectCategory', 0);
    });

    // handles instance when delete category modal is shown
    $('#editCategoryModal').on('show.bs.modal', function () {
        populateParentCategorySelect('#selectCategoryEdit', 0);
    });

    // handles instance when category is selected on add product modal
    $('#parentCategory').on('change', function () {
        let category_id = $('#parentCategory').val();
        $('#product-category-id').val(category_id);
    });

    // handles instance when category is selected on delete category
    $('#selectCategory').on('change', function () {
        let category_id = $('#selectCategory').val();
        let actionUrl = $('#deleteCategoryForm').attr('action');
        actionUrl = actionUrl.replace('category_id', category_id);
        $('#deleteCategoryForm').attr('action', actionUrl);
    });

    // handles instance when category is selected on edit category
    $('#selectCategoryEdit').on('change', function () {
        let category_id = $('#selectCategoryEdit').val();
        let actionUrl = $('#editCategoryForm').attr('action');
        actionUrl = actionUrl.replace('category_id', category_id);
        $('#editCategoryForm').attr('action', actionUrl);
    });

    // Handle product image upload
    $('#img').change(function () {
        let reader = new FileReader();
        reader.onload = (e) => {
            $('#preview-image-before-upload').attr('src', e.target.result);
        };
        reader.readAsDataURL(this.files[0]);
    });

    // function to add options in a category select dropdown menu
    function populateParentCategorySelect(selectCategoryId, defaultValue) {
        let $parentCategorySelect = $(selectCategoryId);
        $parentCategorySelect.empty();
        let getCategories = utils.ajaxParams('/category', 'GET');
        getCategories.success = function (response) {
                let categories = response;
                if (defaultValue == 0)
                    $parentCategorySelect
                        .empty()
                        .append("<option value=''> Select Category </option>");
                else {
                    $.each(categories, function (index, category) {
                        if (category['id'] == defaultValue) {
                            $parentCategorySelect.empty().append(
                                $('<option>', {
                                    value: category['id'],
                                    text: category['name'],
                                })
                            );
                        }
                    });
                }
                $.each(categories, function () {
                    $parentCategorySelect.append(
                        $('<option>', {
                            value: this.id,
                            text: this.name,
                        })
                    );
                });
            },
        $.ajax(getCategories);
    }

    // handles click on close btn of alert
    $('.alert .close').click(function () {
        $(this).parent().fadeOut(500);
    });

    // adds a fade out to alerts
    setTimeout(function () {
        $('.alert').fadeOut(500);
    }, 5000);

    // function to hide settings modal
    function hideSettingsModal(e) {
        $('#settingsModal').modal('hide');
        e.preventDefault();
    }
});
