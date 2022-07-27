<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-7">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Carro</h3>
          </div>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
              </tr>
              <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
              </tr>
              <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /Billing Details -->
      </div>

      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Detalle</h3>
        </div>
        <div class="order-summary">
          <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">$2940.00</strong></div>
          </div>
        </div>
        <div class="payment-method">
          <h5 style="margin-bottom: 20px;">Metodo pago</h5>
          <div class="input-radio">
            <input type="radio" name="payment_media" id="payment_media_debit" value="Debit">
            <label for="payment_media_debit">
              <span></span>
              Debito
            </label>
          </div>
          <div class="input-radio">
            <input type="radio" name="payment_media" id="payment_media_credit" value="Credit">
            <label for="payment_media_credit">
              <span></span>
              Credito
            </label>
          </div>
        </div>
        <a href="#" class="primary-btn order-submit">Pagar</a>
      </div>
      <!-- /Order Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
<?= $this->endSection() ?>