<!DOCTYPE html>
<html lang="en">

<head>
  <title>WorldMovies | Contact Us</title>
  <meta name="description" content="Your page description (150 characters)" />

  <?php
    include 'inc/top.php';
  ?>


  <!-- START: MAIN CONTAINER -->
  <div id="main-container">

    <!-- START: MAIN -->
    <div id="main">
      <div id="main-top">
        <h1>Contact</h1>
      </div>

      <div id="main-body">

        <div id="contact-body">
          <div id="contact-details-block">
            <h2>Contact Details</h2>
            <p>
              Please find our contact details below.
            </p>
            <table id="contact-details-table" cellpadding="0" cellspacing="1">
              <tr>
                <th>
                  Address
                </th>
                <td>
                  Lipsum Road 111, London, W11111
                </td>
              </tr>
              <tr>
                <th>
                  Phone Number
                </th>
                <td>
                  +44(0)27777777
                </td>
              </tr>
              <tr>
                <th>
                  Working Hours
                </th>
                <td>
                  09:00 - 17:00, Mon - Fri
                </td>
              </tr>
            </table>
          </div>

          <div id="contact-form-block">
            <h2>Get in Touch!</h2>

            <form id="contact-form" name="contact-form" action="#" method="post">
              <label for="contact-title">Title</label>
              <br>
              <select id="contact-title" name="contact-title" required>
                <option value="" selected></option>
                <option value="Ms">Ms</option>
                <option value="Mrs">Mrs</option>
                <option value="Mr">Mr</option>
              </select>
              <br><br>

              <label for="contact-firstname">First Name</label>
              <br>
              <input type="text" id="contact-firstname" name="contact-firstname" placeholder="Enter first name" required>
              <br><br>

              <label for="contact-lastname">Last Name</label>
              <br>
              <input type="text" id="contact-lastname" name="contact-lastname" placeholder="Enter last name" required>
              <br><br>

              <label for="contact-email">Email</label>
              <br>
              <input type="email" id="contact-email" name="contact-email" placeholder="Enter email address" required>
              <br><br>

              <label for="contact-phone">Phone Number</label>
              <br>
              <input type="tel" id="contact-phone" name="contact-phone" placeholder="Enter phone number">
              <br><br>

              <label>Gender</label>
              <br>
              <input type="radio" id="contact-gender-female" name="contact-gender" value="Female" />
              <label for="contact-gender-female">Female</label>
              <input type="radio" id="contact-gender-male" name="contact-gender" value="Male" />
              <label for="contact-gender-male">Male</label>
              <input type="radio" id="contact-gender-other" name="contact-gender" value="Other" />
              <label for="contact-gender-other">Other</label>
              <br><br>

              <label for="contact-moviecategories">Preferred Movies</label>
              <br>
              <select id="contact-moviecategories" name="contact-moviecategories" size="5" multiple>
                <option value="action">Action</option>
                <option value="adventure">Adventure</option>
                <option value="comedy">Comedy</option>
                <option value="romance">Romance</option>
                <option value="sci-fi">Sci-Fi</option>
              </select>
              <br><br>

              <label for="contact-message">Message</label>
              <br>
              <textarea id="contact-message" name="contact-message" rows="5" placeholder="Enter your message..." required></textarea>
              <br><br>

              <input type="checkbox" id="contact-newsletter" name="contact-newsletter" value="Yes" checked />
              <label for="contact-newsletter">I would like to receive the WorldMovies monthly newsletter via email.</label>

              <br><br>
              <input class="form-button" type="submit" name="submit" value="Submit">
              <input class="form-button" type="reset" name="reset" value="Reset">

            </form>
          </div>
        </div>


      </div>
    </div>
    <!-- END: MAIN -->


  </div>
  <!-- END: MAIN CONTAINER -->

  <?php
    include 'inc/bottom.php';
  ?>
