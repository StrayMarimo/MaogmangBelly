<div style="height: 5vh" class="white"></div>
<div class="container-fluid">
  <div class="row bg-black text-white p-5">
    <div class="col-4">
      <h3 class="title">Find Us</h3>
      <div class="container">
        <ul class="list-unstyled">
          <li>
            <h5 class="place"><u>Naga City</u></h5>
            <p class="address">Elias Angeles Street, San Francisco</p>
          </li>
          <li>
            <h5 class="place"><u>Legazpi City</u></h5>
            <p class="address">Jone Street, BUCIT Road, Sagpon</p>
          </li>
          <li>
            <h5 class="place"><u>Masbate City</u></h5>
            <p class="address">Ibingay Street, Masbate City</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-4">
      <h3 class="title">Contact</h3>
      <div class="container">
        <ul class="list-unstyled">
          <li>
            <h5 class="place">Email</h5>
            <p class="address">maogmangbelly@gmail.com</p>
          </li>
          <li>
            <h5 class="place">Phone</h5>
            <p class="address">(+63) 91-1250-4959</p>
            <p class="address">(+63) 92-1250-6942</p>
          </li>
        </ul>
      </div>
    </div>
    <div class="col-4">
      <h3 class="title">Subscribe</h3>
      <p class="caption1">Keep up with the good news! Sign up for our newsletter <br> and get the latest on where to find
        us, recipes, & more!
      </p>
      <p class="caption2">Email*</p>
      <form action="subscribe_newsletter" method="POST">
        @csrf
        <input type="email" name="email_newsletter" size="35" style="height: 30px" required>
        <br>
        <br>
        <input type="submit" class="btn btn-danger">
      </form>
    </div>
  </div>
</div>
