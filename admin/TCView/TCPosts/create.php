<?php $this->tcTheme->header(); ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Create post</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <form>
                        <div class="form-group">
                            <label for="formTitle">Title</label>
                            <input type="text" class="form-control"
                                   id="formTitle" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="redactor">Content</label>
                            <textarea class="form-control" name="content"
                                      id="redactor" cols="30"
                                      rows="10"></textarea>
                        </div>
                    </form>
                </div>
                <div class="col-3">
                    <p>Publish this post</p>
                    <button type="submit" class="btn btn-primary"
                            onclick="post.add()">
                        Publish
                    </button>
                </div>
            </div>
        </div>
    </main>
<?php $this->tcTheme->footer(); ?>