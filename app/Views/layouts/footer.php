            </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->


        <!-- Scroll to Top Button -->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <script>var hostUrl = "<?= base_url('/assets/'); ?>"</script>

        
        <script src="<?= base_url('/assets/sbadmin2/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('/assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

        
        <script src="<?= base_url('/assets/sbadmin2/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>

        
        <script src="<?= base_url('/assets/sbadmin2/js/sb-admin-2.min.js') ?>"></script>

        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>


        
        <script>var base_url = '<?= base_url(); ?>'</script>
        <?php $uri = current_url(true); ?>
        <?php if(@$ajax) { ?>
            <script src="<?= base_url('assets/js/own-script/ajax/') ?><?= @$ajax . '.js'; ?>"></script>
        <?php } ?>

    </body>

</html>