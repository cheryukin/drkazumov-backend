$(document).ready(function () {

    $('.tags-item').on('click', function (e) {
        e.preventDefault();
        var currentTags = [];
        var currentTag = $(this).data('tag');
        var tagExist = false;
        $(".tags-item.active").each(function () {
            if ($(this).data('tag') !== currentTag) {
                currentTags.push($(this).data('tag'))
            } else {
                tagExist = true;
            }
        });
        if (!tagExist) {
            currentTags.push(currentTag)
        }
        var tagsStr  = currentTags.join(',');
        if (currentTags.length === 0) {
            window.location.href = location.pathname;
        } else {
            window.location.href = "?tags="+tagsStr;
        }

    });

});