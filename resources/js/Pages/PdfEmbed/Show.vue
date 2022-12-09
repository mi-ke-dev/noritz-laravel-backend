<template>
  <div>
    Hello wworld

    <div id="pdf-view"></div>
  </div>
</template>

<script>

export default {
  props: ["yes_no"],
  components: {
  },

  data() {
    return {
      pdfAPIReady:false,
      adobeDCView:null,
      pdfSelected:false
    };
  },
  created() {
    //credit: https://community.adobe.com/t5/document-services-apis/adobe-dc-view-sdk-ready/m-p/11648022#M948
    if(window.AdobeDC) this.pdfAPIReady = true;
    console.log('created');

    this.adobeDCView = new AdobeDC.View({clientId: "db02d3813b204c8b8d8604461cb64120", divId: "adobe-dc-view"});
    this.adobeDCView.previewFile({
        content: {
          location:
            {
              // 👉 Copy the file URL from the Support app
              url: "https://support.noritz.app/file-download/GQ-C3257WX%20US%20LP%20(NRC111OD)/owners_guide"
            }
        },
        metaData: {
          // 👉 Update the file name
          fileName: "Sample.pdf"
        }
      },
      {
        embedMode: "SIZED_CONTAINER"
      });
  },
  methods: {
  },
  watch: {
    pdfAPIReady(val) {
      // should only be called when true, but be sure
      console.log('here!');
      if(val) {
        console.log('here');


      }
    }
  }
}
</script>
<style scoped>

</style>
