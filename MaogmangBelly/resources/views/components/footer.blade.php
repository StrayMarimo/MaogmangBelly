<div class="row bg-dark text-white p-5">
  <div class="col-4">
    <h3>Find Us</h3>
    <div class="container">
      <ul class="list-unstyled">
        <li>
          <h5><u>Naga City</u></h5>
          <p>Elias Angeles Street, San Francisco</p>
        </li>
        <li>
          <h5><u>Legazpi City</u></h5>
          <p>Jone Street, BUCIT Road, Sagpon</p>
        </li>
        <li>
          <h5><u>Masbate City</u></h5>
          <p>Ibingay Street, Masbate City</p>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-4">
    <h3>Contact</h3>
    <div class="container">
      <ul class="list-unstyled">
        <li>
          <h5>Email</h5>
          <p><u>maogmangbelly@gmail.com</u></p>
        </li>
        <li>
          <h5>Phone</h5>
          <p>(+63) 91-1250-4959</p>
          <p>(+63) 92-1250-6942</p>
        </li>
      </ul>
    </div>
  </div>
  <div class="col-4">
    <h3>Subscribe</h3>
    <p>Keep up with the good news! Sign up for our newsletter and get the latest on where to find us, recipes, & more!
    </p>
    <p>Email*</p>
    <form action="subscribe_newsletter">
      @csrf
      <input type="email" name="email_newsletter">
      <input type="submit" class="btn btn-danger">
    </form>
  </div>
</div>