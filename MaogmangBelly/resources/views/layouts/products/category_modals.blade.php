<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true" style="font-family:'Franklin Gothic Medium';">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm" action="{{ route('add_category') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="category_name" required>
                    </div>
                    <button type="submit" class="red-btn3 btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Category Modal -->
<div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-labelledby="deleteCategoryModalLabel" aria-hidden="true" style="font-family:'Franklin Gothic Medium';">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel">Delete Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deleteCategoryForm" action="{{ route('delete_category')}}" method="POST">
                    @csrf
                    <!-- Save category ID -->
                    <input type="hidden" id="delete-category-id" value="" name="category_id" required>
                    <div class="form-group">
                        <select class="form-control" id="selectCategory" required>
                            <!-- dynamically populate options here -->
                        </select>
                    </div>
                    <button type="submit" class="red-btn3 btn btn-primary mt-2" >Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel"
    aria-hidden="true" style="font-family:'Franklin Gothic Medium';">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCategoryForm" action="{{ route('edit_category')}}" method="POST">
                    @csrf
                    <!-- Save category ID -->
                    <input type="hidden" id="editCategoryId" value="" name="category_id" required>
                    <div class="form-group">
                        <select class="form-control" id="selectCategoryEdit" required>
                            <!-- dynamically populate options here -->
                        </select>
                        <input type="text" name="category_name" id="newCategoryName" placeholder="Enter new name...">
                    </div>
                    <button type="submit" class="red-btn3 btn btn-primary mt-2">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
