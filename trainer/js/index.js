//Creating the form addition row
$(".add-line").click(function () {
    //Preventing double line addition
    if ($(".validate").length != 0) {
        alert("you already have one line waiting for validation !");
        return 0;
    }

    var new_row = $("<tr></tr>");
    new_row.append("<td><button class='validate'>✓</button></td>");
    new_row.append("<td><input id='name' name='Name' /></td>");
    new_row.append("<td><input id='lastname' name='LastName'/></td>");
    new_row.append("<td><input id='phone' name='Phone'/></td>");
    new_row.append("<td><input id='mobile' name='Mobile'/></td>");
    new_row.append("<td><input id='email' name='EMail'/></td>");
    new_row.append("<td><button class='delete'>Delete</button></td>");

    $(".addition-row").before(new_row);
});

//Creating the form modification row
$(document).on("click", ".edit", function () {
    //Preventing double line addition
    if ($(".validate").length != 0) {
        alert("you already have one line waiting for validation !");
        return 0;
    }

    var row = $(this).parent().parent(); //Getting the current row

    //creating a new DOM element from scratch
    var new_row = $("<tr></tr>");
    new_row.append("<td><button class='validate'>✓</button></td>");
    new_row.append("<td><input id='name' name='Name' value='" +
        row.children("td:nth-child(2)").html() +
        "'/></td>");
    new_row.append("<td><input id='lastname' name='LastName' value='" +
        row.children("td:nth-child(3)").html() +
        "'/></td>");
    new_row.append("<td><input id='phone' name='Phone' value='" +
        row.children("td:nth-child(4)").html() +
        "'/></td>");
    new_row.append("<td><input id='mobile' name='Mobile' value='" +
        row.children("td:nth-child(5)").html() +
        "'/></td>");
    new_row.append("<td><input id='email' name='EMail' value='" +
        row.children("td:nth-child(6)").html() +
        "'/></td>");
    new_row.append("<td><button class='delete'>Delete</button></td>");

    row.before(new_row);
    row.remove();
});

//Creating the new row
$(document).on("click", ".validate", function () {
    var array = [];
    //Validation function call (not needed for the exemple here)
    if (!validation_function("dummy_param")) {
        alert("error message");
        return 0;
    }

    var row = $(this).parent().parent(); //Getting the current row

    //Getting the last Id of the table or 1 if there are no lines / editing first line
    var new_id = 1;
    if (row.prev().children("td:first-child").length)
        new_id = parseInt(row.prev().children("td:first-child").html()) + 1;

    //Updating row with fields values
    row.find("td:first-child").html(new_id);
    row.children("td").each(function () {
        array.unshift($(this).children("input").val());
        $(this).html($(this).children("input").val());
    });
    row
        .find("td:last-child")
        .html(
            "<button class='edit'>Edit</button><button class='delete'>Delete</button>"
        );
    var url = "trainerData.php?" + "query=insert into trainer values('" + array[5] +" " + array[4] + "'," + array[3] + "," + array[2] + ",'" + array[1] + "');";
    $.get(url, function (data, status) {});
});

//Deleting a row
$(document).on("click", ".delete", function () {
    //Deletion function call (not needed for the exemple here)
    if (!deletion_function("dummy_param")) {
        alert("error message");
        return 0;
    }

    //DOM deletion
    var row = $(this).parent().parent(); //Getting the current row
    var num = row.children("td:nth-child(4)").html();
    var url = "trainerData.php?query=delete from Trainer where phonexcheck" + num + ";";
    console.log(url);
    $.get(url, function (data, status) {});
    row.remove(); //deleting

    update_ids();
});

//Updates the Ids of the table
function update_ids() {
    for (var i = 2; i < $(".dynamic-table tr").length; i++) {
        $(".dynamic-table tr:nth-child(" + i + ") td:first-child").html(i - 1);
    }
}

//Binding enter key press on input to line validation
$(document).keypress(function (e) {
    var key = e.which;
    if (key == 13) // the enter key code
    {
        $('.validate').click();
        return false;
    }
});

//Binding double click to line selection
$(document).on("dblclick", "tr", function () {
    console.log($(this).find(".edit").html());
    if ($(this).find("td").length)
        $(this).find(".edit").click();
});

function validation_function(args) {
    //Perform input values validation here
    return true;
}

function deletion_function(args) {
    //Perform row deletion validation here
    return true;
}
