$(document).ready(function () {
    $("input:radio[name=forPickUp]").click(function () {
        $("#addressPicker").hide();
        $("#address").prop("required", false);
        $("#forPickup").prop("checked", true);
        $("#forDelivery").prop("checked", false);
    });

    $("input:radio[name=forDelivery]").click(function () {
        $("#addressPicker").show();
        $("#forDelivery").prop("checked", true);
        $("#forPickup").prop("checked", false);
        $("#address").prop("required", true);
    });
});
