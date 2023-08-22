<script src="assets/js/app.js"></script>
<script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
  crossorigin="anonymous"
></script>

<script>
  var tw = new Date();
  if (tw.getTimezoneOffset() == 0) a = tw.getTime() + 7 * 60 * 60 * 1000;
  else a = tw.getTime();
  tw.setTime(a);
  var tahun = tw.getFullYear();
  var hari = tw.getDay();
  var bulan = tw.getMonth();
  var tanggal = tw.getDate();
  var hariarray = new Array(
    "Minggu,",
    "Senin,",
    "Selasa,",
    "Rabu,",
    "Kamis,",
    "Jum'at,",
    "Sabtu,"
  );
  var bulanarray = new Array(
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "Nopember",
    "Desember"
  );
  document.getElementById("tanggalwaktu").innerHTML =
    hariarray[hari] + " " + tanggal + " " + bulanarray[bulan] + " " + tahun;
</script>

<script type="text/javascript">
  window.onload = function () {
    jam();
  };

  function jam() {
    var e = document.getElementById("jam"),
      d = new Date(),
      h,
      m,
      s;
    h = d.getHours();
    m = set(d.getMinutes());
    s = set(d.getSeconds());

    e.innerHTML = h + ":" + m + ":" + s;

    setTimeout("jam()", 1000);
  }

  function set(e) {
    e = e < 10 ? "0" + e : e;
    return e;
  }
</script>
