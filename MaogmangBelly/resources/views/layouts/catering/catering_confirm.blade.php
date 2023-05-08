<!-- Modal -->
<div class="modal fade text-black" id="confirmCheckoutCatering" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Catering Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you want to confirm your requested Catering Service?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="btn btn-success" id=checkoutCateringBtn data-order-id={{$order['id']}}>Confirm</button>
      </div>
    </div>
  </div>
</div>