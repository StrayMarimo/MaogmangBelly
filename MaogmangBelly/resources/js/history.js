$(document).ready(function () {
  $('td.date-purchased').each(function () {
      // Get the original date string from the td element
      var dateString = $(this).text().trim();

      // Parse the date string using moment.js
      var date = moment(dateString, 'YYYY-MM-DD HH:mm:ss');

      // Reformat the date using moment.js
      var formattedDate = date.format('MMM D, YYYY [at] h:mm A');

      // Set the text of the td element to the reformatted date
      $(this).text(formattedDate);
  });
});