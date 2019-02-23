jQuery(document).ready(function ($) {
  function calculateTaxRates (value) {
    var propertyValue = Number(value.replace(/[$,]/g, ''));
    if (!propertyValue) return;

    var areas = [
      'unincorporated',
      'savannah',
      'pooler',
      'port-wentworth',
      'garden-city',
      'bloomingdale',
      'thunderbolt',
      'tybee-island',
      'vernonburg'
    ];
    areas.forEach(function (area) {
      var effectiveRate =
        Number($('#effective-rate > td.' + area).text().replace(/[$,]/g, ''));
      var tax = (propertyValue / 1000) * effectiveRate;
      if (tax > 0) {
        $('#property-taxes > td.' + area).text('$' + Math.round(tax));
      }
    });
  }

  var inputField = $('input#property-value');
  inputField.on('input', function (ev) {
    calculateTaxRates(ev.target.value);
  });

  var startingValue = inputField.val();
  calculateTaxRates(startingValue);
});