import  json
import urllib.request as urllib
import numpy as np
from urllib.request import Request, urlopen

url = "https://clean-grove-ufmdrajfucxe.vapor-farm-a1.com/api/heaters"

while (url):
  print('while '+ url)
  req = Request(url, headers={'User-Agent': 'Mozilla/5.0'})
  response = urllib.urlopen(req)
  data = json.loads(response.read())
  heaters = np.array(data['data'])
  url = data['next_page_url']

  f = open("src/nrcr92.html", "r", encoding='utf-8')
  fContent = f.read()
  for x in heaters:
    print(x['model_no'])
    rx = fContent.replace("[[MARKETING_IMAGE]]",x['full_marketing_image'])
    if(x['marketing_name']):
      rx = rx.replace("[[MARKETING_NAME]]",x['marketing_name'])
    else:
      rx = rx.replace("[[MARKETING_NAME]]",'')
    
    if(x['heater_series']['category']):
      rx = rx.replace("[[SERIES_CATEGORY]]",x['heater_series']['category'])
    else:
      rx = rx.replace("[[SERIES_CATEGORY]]",'')

    if(x['heater_series']['description']):
      rx = rx.replace("[[SERIES_DESCRIPTION]]",x['heater_series']['description'])
    else:
      rx = rx.replace("[[SERIES_DESCRIPTION]]", '')

    if(x['heater_series']['lifestyle_photo_description']):
      rx = rx.replace("[[SERIES_LIFESTYLE_PHOTO_DESCRIPTION]]",x['heater_series']['lifestyle_photo_description'])
    else:
      rx = rx.replace("[[SERIES_LIFESTYLE_PHOTO_DESCRIPTION]]",'')
    heater_name_show = ''
    if(x['heater_series']['heaters']):
      for fhn in x['heater_series']['heaters']:

        if(heater_name_show != ''):
          heater_name_show +=' | '
          # print(' | ')
        
        if(fhn['model_no'] == x['model_no']):
          heater_name_show += '<a style="text-decoration: underline;">'
        else:
          heater_name_show += '<a href="'+fhn['model_no']+'.html">'

        heater_name_show += fhn['model_no']
        heater_name_show += '</a>'

    rx = rx.replace("[[SERIES_HEATERS]]", heater_name_show)
    
    
    highlight_show = ''
    highlight = ''
    for fh in x['feature_highlights']:
      h_html='<div class="helpblock"><img src="[[FEATURE_HIGHLIGHTS_IMAGE]]" loading="lazy" alt="" class="iconimage"><div class="icontext">[[FEATURE_HIGHLIGHTS_NAME]]</div></div>'
      h_html = h_html.replace("[[FEATURE_HIGHLIGHTS_IMAGE]]",fh['full_icon_svg'])
      h_html = h_html.replace("[[FEATURE_HIGHLIGHTS_NAME]]",fh['highlight'])
      highlight_show += h_html

    if(highlight_show != ''):
      highlight = '<div class="featuresection wf-section"><div class="w-layout-grid ftgrid">[[FEATURE_HIGHLIGHTS]]</div></div>'
      highlight = highlight.replace("[[FEATURE_HIGHLIGHTS]]",highlight_show)

    rx = rx.replace("[[FEATURE_HIGHLIGHTS]]",highlight)

    #FEATURE_SPEC
    feature_show = ''
    feature = ''
    for fs in x['feature_specs']:
      fs_html = '<div class="specblocks"><h1 class="heading-5">[[FEATURE_SPEC]]</h1></div>'
      fs_html = fs_html.replace("[[FEATURE_SPEC]]", fs['highlight'])
      feature_show += fs_html
    rx = rx.replace("[[FEATURE_SPEC]]",feature_show)   
    rx = rx.replace("[[COMPARE_URL]]",'/compare-heaters.html?modelList='+x['model_no'])   
    
      
    
    # print(rx)
    with open("src/products/%s.html" % (x['model_no']), 'wb') as newHTMLFile:
      newHTMLFile.write(rx.encode("utf-8"))
      newHTMLFile.close()