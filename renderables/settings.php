<div>
  <?php screen_icon(); ?>
  <h2>ICA Millage Compare Plugin</h2>
  <form method="post" action="options.php">
    <?php settings_fields('iac_millage_settings'); ?>
    <h3>This option allows you to change the output of the plugin. There are two options:</h3>
    <ol>
      <li>
        <h4>
          Surrounding Areas - Display an table of millage rates for the surrounding areas
          including the unincorpated.
        </h4>
      </li>
      <li>
        <h4>
          City Tax - Display a tax comparison table, showing the current unincorporated
          area millage against the proposed city tax.
        </h4>
      </li>
    </ol>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row">
            <label for="iac_millage_display">Millage/Tax table to display</label>
          </th>
          <td>
            <select id="iac_millage_display" name="iac_millage_display">
              <option value="area" <?php if (get_option('iac_millage_display') === 'area') { ?>selected <?php } ?>>
                Surrounding Areas
              </option>
              <option value="city" <?php if (get_option('iac_millage_display') === 'city') { ?>selected <?php } ?>>
                City Tax
              </option>
            </select>
          </td>
        </tr>
      </tbody>
    </table>
    <?php submit_button(); ?>
  </form>
</div>