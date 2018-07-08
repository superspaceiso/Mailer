<form role="form" action="mailer.php" method="post" style="padding-bottom: 20px;">
  <div class="form-group">
    <label>Name:</label>
    <input type="text" class="form-control" name="name" required>
  </div>
  <div class="form-group">
    <label>Email Address:</label>
    <input type="email" class="form-control" name="email" required>
  </div>
  <div class="form-group">
    <label>Phone:</label>
    <input type="tel" class="form-control" name="phone" required>
  </div>
  <div class="form-group">
    <label>Message:</label>
    <textarea class="form-control" rows="8" name="message" required></textarea>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>