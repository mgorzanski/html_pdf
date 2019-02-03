<?php

$baseDir = $layout->baseDir();

$body = <<<EX

			<section class="panel panel-default">
                <div class="panel-body">
                    Insert below an address of the website that you want to convert or select an HTML file
                </div>
            </section>

            <section class="content">
                <div class="insert-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#website" aria-controls="website" role="tab" data-toggle="tab">Website</a></li>
                        <li role="presentation"><a href="#html" aria-controls="html" role="tab" data-toggle="tab">HTML</a></li>
                    </ul>

                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="website">
                            <form class="tab-form">
                                <div class="form-group">
                                    <label class="control-label" for="addressInput">Website address</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-globe" aria-hidden="true"></span></span>
                                        <input type="url" class="form-control" id="addressInput" placeholder="URL..." aria-describedby="addressInput" name="addressInput">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" checked name="saveImagesCheckboxWebsite">
                                            Save images
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" checked name="loadJavaScriptCheckboxWebsite">
                                            Load JavaScript
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="websiteSubmit">Submit</button>
                            </form>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="html">
                            <form class="tab-form" id="html-form" enctype="multipart/form-data" method="post">
                                <div class="form-group">
                                    <label for="htmlInput">HTML file</label>
                                    <input type="file" id="htmlInput" name="htmlInput">
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" checked name="saveImagesCheckboxHtml">
                                            Save images
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="" checked name="loadJavaScriptCheckboxHtml">
                                            Load JavaScript
                                        </label>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary" id="htmlSubmit">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="loading-gif">
                    <img src="{$baseDir}/images/Spinner.gif" alt="Loading GIF">
                </div>
			</section>

            <div class="modal fade" id="htmlModal" tabindex="-1" role="dialog" aria-labelledby="htmlModalLabel">
                <div class="modal-dialog modal-extra-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="htmlModalLabel">Convert HTML to PDF</h4>
                        </div>
                        <div class="modal-body">
                            <nav class="options-nav">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <p class="switch-text">Save images</p>
                                        <label class="switch">
                                            <input type="checkbox" value="" id="htmlPreviewSaveImagesCheckbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <p class="switch-text">Load JavaScript</p>
                                        <label class="switch">
                                            <input type="checkbox" value="" id="htmlPreviewLoadJavaScriptCheckbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </nav>
                            <div class="live-preview">
                                <iframe id="htmlIframe" width="100%" height="100%" src="#" runat="server" allowfullscreen="false" scrolling="no"></iframe>
                                <div class="notClickable"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="htmlAccept">Accept</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="htmlFinishModal" tabindex="-1" role="dialog" aria-labelledby="htmlFinishModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="htmlFinishModalLabel">Download PDF</h4>
                        </div>
                        <div class="modal-body">
                            <a id="htmlFinishModalDownloadLink" href="#" class="btn btn-primary btn-lg btn-block">Download</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="websiteModal" tabindex="-1" role="dialog" aria-labelledby="websiteModalLabel">
                <div class="modal-dialog modal-extra-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="websiteModalLabel">Convert Website to PDF</h4>
                        </div>
                        <div class="modal-body">
                            <nav class="options-nav">
                                <div class="form-group">
                                    <div class="checkbox">
                                        <p class="switch-text">Save images</p>
                                        <label class="switch">
                                            <input type="checkbox" value="" id="websitePreviewSaveImagesCheckbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <p class="switch-text">Load JavaScript</p>
                                        <label class="switch">
                                            <input type="checkbox" value="" id="websitePreviewLoadJavaScriptCheckbox" checked>
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                </div>
                            </nav>
                            <div class="live-preview">
                                <iframe id="websiteIframe" width="100%" height="100%" src="#" runat="server" allowfullscreen="false" scrolling="no"></iframe>
                                <div class="notClickable"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="websiteAccept">Accept</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="websiteFinishModal" tabindex="-1" role="dialog" aria-labelledby="websiteFinishModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="websiteFinishModalLabel">Download PDF</h4>
                        </div>
                        <div class="modal-body">
                            <a id="websiteFinishModalDownloadLink" href="#" class="btn btn-primary btn-lg btn-block">Download</a>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

EX;

$layout->fill('title', 'PDF Converter');
$layout->fill('body', $body);

?>