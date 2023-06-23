export function showToaster(bodyContent, title) {
    let toastClass = '#minRequiredToast';
    $(toastClass + ' .toast-body').text(bodyContent);
    $(toastClass + ' small').text(title);
    $(toastClass).show();
    $(toastClass).delay(2000).fadeOut('slow');
}

export function ajaxParams(url, method ){
    return {
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        url: url,
        method: method,
        error: function (xhr) {
            console.log(xhr.responseText);
        },
    };
}

export function formatDate(dateString) {
    // Parse the date string using moment.js
    var date = moment(dateString, 'YYYY-MM-DD HH:mm:ss');

    // Reformat the date using moment.js
   return date.format('MMM D, YYYY [at] h:mm A');
}