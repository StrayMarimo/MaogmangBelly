<!-- Modal -->
<div class="modal fade" id="confirmReservation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="font-family: 'Lexend';">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Reservation Confirmation</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
        Are you sure that you want reserve these products?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button class="contact-red btn" data-order-id={{$order['id']}}
                        style="border: 2px solid #A72322; color: white; font-family: 'Lexend';" type="submit" id="checkoutReservationBtn"
                        value="Submit"> Buy Now! </button>
      </div>
    </div>
  </div>
</div>