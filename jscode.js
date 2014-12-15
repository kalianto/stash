    /* Example of how to construct html elements using jQuery */
    var dialog = $("<div/>", {
                'class':'control-list-action twitter-bootstrap',
                'id':"control-action"
            }).append(
                $("<div/>", {
                    "class":"popover left"
                }).css("display", "block").append($("<div/>", {
                    "class":"arrow"
                })).append($("<h3/>", {
                    "class":"popover-title",
                    "text":"Action settings"
                })).append(
                    $("<div/>", {
                        "class":"popover-content"
                    }).append(
                        $("<div/>", {"class":"twitter-bgloading", "id":"action-loading"}).append(
                            $("<i/>", {"class":"twitter-icon32 twitter-icon-loading"})
                        )
                    ).append(
                        $("<div/>", {"id":"accordion_content", "class":"hide"}).append(
                            $("<h3/>").append(
                                $("<a/>", {"href":"#"}).append("Show form field(s)")
                            )
                        ).append(
                            $("<div/>", {"id":"twitter-action-show"})
                        ).append(
                            $("<h3/>").append(
                                $("<a/>", {"href":"#"}).append("Hide form fields(s)")
                            )
                        ).append(
                            $("<div/>", {"id":"twitter-action-hide"})
                        )
                    )
                )
            )
    $(dialog).appendTo('body');
