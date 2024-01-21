<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="<?=base_url('/assets/scripts.js')?>"></script>
<script>
    <?php if ($this->session->flashdata('success')) { ?>
        alert('Sukses! <?=$this->session->flashdata('success')?>');
    <?php } ?>
    <?php if ($this->session->flashdata('error')) { ?>
        alert('Gagal! <?=$this->session->flashdata('error')?>');
    <?php } ?>
</script>
</html>