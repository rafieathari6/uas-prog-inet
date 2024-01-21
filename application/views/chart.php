<?php include('layouts/header.php'); ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"></script>
<title>Data Statistik Kota</title>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Atur <b>Kota</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-info" onclick="exportChart('kota')"><i class="material-icons">&#xE8AD;</i> <span>Cetak Chart</span></a>
                        </div>
                    </div>
                </div>
                <?=$bar->render()?>
            </div>
        </div>        
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    window.jsPDF = window.jspdf.jsPDF;

    const exportChart = (id) => {
        const chartEl = document.getElementById(id);
        const image = chartEl.toDataURL('image/png', 1.0);

        const pdf = new jsPDF('landscape');
        pdf.addImage(image, 'PNG', 0, 0);
        pdf.save('chart.pdf');
    }
</script>
</html>