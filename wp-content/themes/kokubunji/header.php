<!DOCTYPE html>
<html lang="jp">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>国分寺コンシェルジュ</title>
    <meta name="description" content="" />
    <meta property="og:title" content="国分寺コンシェルジュ" />
    <meta property="og:site_name" content="国分寺コンシェルジュ" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:type" content="website" />
    <link rel="icon" type="image/png" href="/assets/img/common/favicon.ico" />
    <script>
      (function (d) {
        var config = {
            kitId: "yuk8yzd",
            scriptTimeout: 3000,
            async: true,
          },
          h = d.documentElement,
          t = setTimeout(function () {
            h.className =
              h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive";
          }, config.scriptTimeout),
          tk = d.createElement("script"),
          f = false,
          s = d.getElementsByTagName("script")[0],
          a;
        h.className += " wf-loading";
        tk.src = "https://use.typekit.net/" + config.kitId + ".js";
        tk.async = true;
        tk.onload = tk.onreadystatechange = function () {
          a = this.readyState;
          if (f || (a && a != "complete" && a != "loaded")) return;
          f = true;
          clearTimeout(t);
          try {
            Typekit.load(config);
          } catch (e) {}
        };
        s.parentNode.insertBefore(tk, s);
      })(document);
    </script>
    <?php wp_head(); ?>
  </head>