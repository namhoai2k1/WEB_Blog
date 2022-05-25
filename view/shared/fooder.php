	<div id="footer">
		<div>
			<div class="first">
				<h3><a href="index.html">Ecothunder</a></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat eleifend arcu, sit amet rutrum lectus lobortis quis. Donec aliquam</p>
				<div>
					<p>Telephone. : <span>12345678-90</span></p>
					<p>Fax : <span>23456789-01</span></p>
					<p>Email : <span>ask@ecothunder.com</span></p>
				</div>
			</div>
			<div>
				<h3>Get Social with us!</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat eleifend arcu, sit amet rutrum lectus lobortis quis. Donec aliquam</p>
				<div>
					<a href="http://facebook.com/freewebsitetemplates" class="facebook" target="_blank"></a>
					<a href="http://twitter.com/fwtemplates" class="twitter" target="_blank"></a>
					<a href="#" class="linked-in"></a>
				</div>
			</div>
			<div>
				<h3>Share your thoughts!</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent placerat eleifend arcu, sit amet rutrum lectus lobortis quis. Donec aliquam</p>
				<form action="#">
					<label for="subscribe"><input type="text" id="subscribe" maxlength="30" value="email address" /></label>
					<input class="submit" type="submit" value="" />
				</form>
				<p>Copyright &copy; 2011  Ecothunder Incorporated <br />LRP 727 6783 83839 All rights reserved</p>
			</div>
		</div>
	</div>
	<div class="modal" id="modalBlog">
    <div class="modal-dialog" style="max-width: 712px;">
        <div class="modal-content bg-dark text-white">
            <!-- Modal body -->
            <div class="modal-body">
                <form action="../model/addBlog.php?id=<?php echo $id; ?>" method="post">
                <div class="card bg-dark text-white">
                        <div class="card-header d-flex align-center justify-content-between">
                            <h4 class="modal-title">Them vao tin cua ban</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="card-body">
                            <!-- <form method="POST" enctype="multipart/form-data"> -->
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col">
                                        <label for="" class="h5">Content</label>
                                        <textarea
                                            type="text"
                                            class="form-control"
                                            name="content"
                                            rows="5"
                                        ></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" name="addBlog">Update</button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>