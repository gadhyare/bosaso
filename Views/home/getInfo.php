      <script>
          function getExchange() {
              const url = new URL("https://bankofsomaliland.net/wp-json/exchslnb/v1/exchange")
              const rateDate = document.querySelector("#rateDate")
              const usdsell = document.querySelector("#usdsell")
              const usdbuy = document.querySelector("#usdbuy")
              const Eurosell = document.querySelector("#Eurosell")
              const Eurobuy = document.querySelector("#Eurobuy")
              const GBPsell = document.querySelector("#GBPsell")
              const GBPbuy = document.querySelector("#GBPbuy")
              const AEDsell = document.querySelector("#AEDsell")
              const AEDbuy = document.querySelector("#AEDbuy")
              const SARsell = document.querySelector("#SARsell")
              const SARbuy = document.querySelector("#SARbuy")
              const ETBsell = document.querySelector("#ETBsell")
              const ETBbuy = document.querySelector("#ETBbuy")
              const KESsell = document.querySelector("#KESsell")
              const KESbuy = document.querySelector("#KESbuy")
              const siteNmae = document.querySelector("#siteNmae")

              document.querySelector("#siteNmae").textContent = url.origin
              fetch(url).then(function(response) {
                  return response.json()
              }).then(function(obj) {
                  rateDate.textContent = obj[0].date ?? 0
                  usdsell.textContent = obj[0].usdsell ?? 0
                  usdbuy.textContent = obj[0].usdbuy ?? 0
                  Eurosell.textContent = obj[0].Eurosell ?? 0
                  Eurobuy.textContent = obj[0].Eurobuy ?? 0
                  GBPsell.textContent = obj[0].GBPsell ?? 0
                  GBPbuy.textContent = obj[0].GBPbuy ?? 0
                  AEDsell.textContent = obj[0].AEDsell ?? 0
                  AEDbuy.textContent = obj[0].AEDbuy ?? 0
                  SARsell.textContent = obj[0].SARsell ?? 0
                  SARbuy.textContent = obj[0].SARbuy ?? 0
                  ETBsell.textContent = obj[0].ETBsell ?? 0
                  ETBbuy.textContent = obj[0].ETBbuy ?? 0
                  KESsell.textContent = obj[0].KESsell ?? 0
                  KESbuy.textContent = obj[0].KESbuy ?? 0
              })
          }


          getExchange();
      </script>