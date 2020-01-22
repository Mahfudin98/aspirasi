var notificationsWrapper   = $('.dropdown-notifications');
var notificationsToggle    = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('i[data-count]');
var notificationsCount     = parseInt(notificationsCountElem.data('count'));
var notifications          = notificationsWrapper.find('div.dropdown-header');
if (notificationsCount <= 0) {
    notifications.hide();
}
    // Enable pusher logging - don't include this in production
Pusher.logToConsole = true;

var pusher = new Pusher('bfaa9f1901b2fe1c7050', {
    cluster: 'ap1',
    forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
//alert(JSON.stringify(data));
    var existingNotifications = notifications.html();
    var newNotificationHtml = `
        <a href="#" class="dropdown-item">
        <i class="fas fa-envelope mr-2"></i><strong>`+data.form_data.nama.slice(0, 5)+`..</strong>, `+data.form_data.masukan.slice(0, 18)+`... &nbsp;<span class="float-right text-muted text-sm">3 mins</span>
        </a>
    `;
    notifications.html(newNotificationHtml + existingNotifications);

    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notifications.show();
});
