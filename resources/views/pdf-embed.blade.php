<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" href="Index.css"/>
    <title>Title</title>
</head>
<body>
<!-- START EMBED -->
<div id="adobe-dc-view" style="height: 100vh; width: 100%;"></div>
<script src="https://documentcloud.adobe.com/view-sdk/main.js"></script>
<script type="text/javascript">
    document.addEventListener("adobe_dc_view_sdk.ready", function () {
        var adobeDCView = new AdobeDC.View({clientId: "db02d3813b204c8b8d8604461cb64120", divId: "adobe-dc-view"});
        adobeDCView.previewFile({
                content: {
                    location:
                        {
                            // 👉 Copy the file URL from the Support app
                            url: "{{ $url }}"
                        }
                },
                metaData: {
                    // 👉 Update the file name
                    fileName: '{{ $fileName }}'
                }
            },
            {
                embedMode: "SIZED_CONTAINER"
            });
    });
</script>
<!-- END EMBED -->

</body>
</html>
