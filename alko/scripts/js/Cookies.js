function setCookies(reset = false) {
  let url = "./index.php";
  let isFilterSet = false;

  if (reset) {
    document.cookie = "country= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "priceLow= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "priceHigh= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "type= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "energyLow= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "energyHigh= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    document.cookie = "bottleSize= ; expires = Thu, 01 Jan 1970 00:00:00 GMT";
    window.location = url;
    return;
  } else {
    let params = new URLSearchParams(window.location.search);
    let index = document.getElementById("country").selectedIndex;
    let selected = document.getElementById("country");
    let priceLow = document.getElementById("priceLow").value;
    let priceHigh = document.getElementById("priceHigh").value;
    let type = document.getElementById("type").value;
    let energyLow = document.getElementById("energyLow").value;
    let energyHigh = document.getElementById("energyHigh").value;
    let bottleSize = document.getElementById("bottleSize").value;

    // Reset all filters before applying new ones
    params.delete("country");
    params.delete("priceLow");
    params.delete("priceHigh");
    params.delete("type");
    params.delete("energyLow");
    params.delete("energyHigh");
    params.delete("bottleSize");

    if (index !== 0) {
      params.set("country", selected.value);
      isFilterSet = true;
    }
    if (priceLow !== "") {
      params.set("priceLow", priceLow);
      isFilterSet = true;
    }
    if (priceHigh !== "") {
      params.set("priceHigh", priceHigh);
      isFilterSet = true;
    }
    if (type !== "") {
      params.set("type", type);
      isFilterSet = true;
    }
    if (energyLow !== "") {
      params.set("energyLow", energyLow);
      isFilterSet = true;
    }
    if (energyHigh !== "") {
      params.set("energyHigh", energyHigh);
      isFilterSet = true;
    }
    if (bottleSize !== "") {
      params.set("bottleSize", bottleSize);
      isFilterSet = true;
    }

    // Reset the page number to 0 when a new filter is applied
    if (isFilterSet) {
      params.set("page", 0);
    }

    url += "?" + params.toString();
  }

  if (isFilterSet) {
    window.location = url;
  }
}
