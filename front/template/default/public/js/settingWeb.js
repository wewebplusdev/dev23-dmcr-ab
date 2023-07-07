$(document).ready(function(){
  // client_key & client_secret form oneaccount
  const client_key = "register";
  const client_secret = "oJu3qRjhoJ9aM3DhnKW4L3OgoJE3YxkloJIaqUEmnJy4M3OyoKW3G0j%2SoJkapaE1nFM4paOyoKE3p0kcoJqaMKElnH94C3O5oJI3n0k0oJIapaEwnJI4pj%3Q%3Q";
//   const URL_API = 'http://web.wewebcloud.com/webservice/dmcr_oneaccount/';
  const URL_API = 'https://api.dmcr.go.th/webservice/dmcr_oneaccount/';
  const PATH_GETTOKEN = 'site_gettoken';  
  const PATH_GETUSER = 'site_setting';  

  if (isBase64Setting($.cookie("SETTING_SECRET")) != client_secret) {
      $.removeCookie('SETTING_SECRET', { path: '/' });
      (async () => {
          const TokenSetting = await getTokenSetting();
          if (TokenSetting.status == 1001) {
              const SiteSetting = await getSiteSetting(TokenSetting.token);
              if (SiteSetting.status == 1001) {
                  var date = new Date();
                  var day = 90;
                  var hour = 24;
                  var minutes = 60;
                  date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
                  $.cookie('SETTING_SECRET', btoa(client_secret), {
                      expires: date,
                      path: '/'
                  });
                  $.cookie('SETTING_AUTH', btoa(TokenSetting.token), {
                      expires: date,
                      path: '/'
                  });
                  await setupSettingPage(SiteSetting);
              }else{
                  $.removeCookie('SETTING_SECRET', { path: '/' });
                  $.removeCookie('SETTING_AUTH', { path: '/' });
                  console.log('get setting error.');
              }
          }else{
              $.removeCookie('SETTING_SECRET', { path: '/' });
              $.removeCookie('SETTING_AUTH', { path: '/' });
              console.log('get token error.');
          }
      })().catch(() => {});
  }else{
      (async () => {
          const SiteSetting = await getSiteSetting(isBase64Setting($.cookie("SETTING_AUTH")));
          if (SiteSetting.status == 1001) {
              await setupSettingPage(SiteSetting);
          }else{
              const TokenSetting = await getTokenSetting();
              if (TokenSetting.status == 1001) {
                  const SiteSetting = await getSiteSetting(TokenSetting.token);
                  if (SiteSetting.status == 1001) {
                      var date = new Date();
                      var day = 90;
                      var hour = 24;
                      var minutes = 60;
                      date.setTime(date.getTime() + (day * (hour * minutes * 60 * 1000)));
                      $.cookie('SETTING_SECRET', btoa(client_secret), {
                          expires: date,
                          path: '/'
                      });
                      $.cookie('SETTING_AUTH', btoa(TokenSetting.token), {
                          expires: date,
                          path: '/'
                      });
                      await setupSettingPage(SiteSetting);
                  }else{
                      $.removeCookie('SETTING_SECRET', { path: '/' });
                      $.removeCookie('SETTING_AUTH', { path: '/' });
                      console.log('get setting error.');
                  }
              }else{
                  $.removeCookie('SETTING_SECRET', { path: '/' });
                  $.removeCookie('SETTING_AUTH', { path: '/' });
                  console.log('get token error.');
              }
          }
      })().catch(() => {});
  }

  async function getTokenSetting() {
      const settings = {
          "url": URL_API + PATH_GETTOKEN,
          "method": "POST",
          "async": "false",
          "data": {
              "client_key": btoa(client_key)
          },
      };
      const result = await $.ajax(settings);
      return result;
  }

  async function getSiteSetting(token) {
      const settings = {
          "url": URL_API + PATH_GETUSER,
          "method": "POST",
          "async": "false",
          "data": {
              "Authorization": token,
              "client_key": btoa(client_key),
              "client_secret": btoa(client_secret),
          },
      };
      const result = await $.ajax(settings);
      return result;
  }

  function isBase64Setting(str) { // check secret key is empty
      if (typeof str ==='undefined'){ return false; }
      if (str ==='' || str.trim() ===''){ return false; }
      try {
          if (btoa(atob(str)) == str){ return atob(str); }
      } catch (err) {
          return false;
      }
  }

  function setupSettingPage(setting){
      let data = setting.data;
      // policy coppy right
      $('.desc.-api-policy').html(data.subjectoffice+"<br>"+data.policy);
      // contact
      $('.-api-address').html(data?.config?.address);
      $('.-api-tel-1').html(data?.config?.tel);
      let arr_tel = replaceApi(data.config?.tel, ' ', '').split('-');
      $('.-api-tel-1-call').attr('href', 'tel:'+arr_tel[0]);
      $('.-api-tel-2').html(data?.config?.tel1);
      let arr_tel2 = replaceApi(data.config?.tel1, ' ', '').split('-');
      $('.-api-tel-2-call').attr('href', 'tel:'+arr_tel2[0]);
      $('.-api-fax').html(data?.config?.fax);
      $('.-api-email').html(data?.config?.email);
      $('.-api-email-to').attr('href', 'mailto:'+data?.config?.email);
      // social media
      $('.-api-social-fb').attr('href', data?.social?.Facebook?.link);
      $('.-api-social-tw').attr('href', data?.social?.Twitter?.link);
      $('.-api-social-yt').attr('href', data?.social?.Youtube?.link);
      $('.-api-social-ig').attr('href', data?.social?.Instagram?.link);
      $('.-api-social-li').attr('href', data?.social?.Line?.link);
      $('.-api-social-tt').attr('href', data?.social?.Tiktok?.link);
  }

  function replaceApi(str, find, replace) {
      return str.replace(new RegExp(find, 'g'), replace);
  }
});