<?php
include("../../includes/header.php");

?>
<div class="d-sm-flex text-center justify-content-between align-items-center mb-4">
    <h3 class="mb-sm-0 mb-1 fs-18">Slider Module</h3>
    <ul class="ps-0 mb-0 list-unstyled d-flex justify-content-center">
        <li>
            <a href="index.html" class="text-decoration-none">
                <i class="ri-home-2-line" style="position: relative; top: -1px;"></i>
                <span>Home</span>
            </a>
        </li>
        <li>
            <span class="fw-semibold fs-14 heading-font text-dark dot ms-2">Slider Module</span>
        </li>
    </ul>
</div>

<div class="card bg-white border-0 rounded-10 mb-4">
    <div class="card-body p-4">
        <div class="d-sm-flex text-center justify-content-between align-items-center border-bottom pb-20 mb-20">
            <h4 class="fw-semibold fs-18 mb-sm-0">Add Slider</h4>
            <a href="create.php" class="border-0 btn btn-custom py-2 px-3 px-sm-4 text-white fs-14 fw-semibold rounded-3">
                <span class="py-sm-1 d-block">
                    <i class="ri-add-line text-white"></i>
                    <span>Add New Slider</span>
                </span>
            </a>
        </div>

        <div class="default-table-area members-list">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Sr No.</th>
                            <th scope="col">Image Preview</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>
                               <span>1</span>
                            </td>
                            <td>
                                <span>Agent</span>
                            </td>
                            <td>
                                <div class="d-flex gap-2 justify-content-center">
                                    <span class="bg-success bg-opacity-10 text-success fs-13 fw-semibold py-1 px-2 rounded-1">Active</span>
                                </div>
                            </td>
                            <td>
                                <div class="dropdown action-opt">
                                    <button class="btn bg p-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i data-feather="more-horizontal"></i>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end bg-white border box-shadow">
                                        <li>
                                            <a class="dropdown-item" href="javascript:;">
                                                <i data-feather="share-2"></i>
                                                Share
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;">
                                                <i data-feather="link-2"></i>
                                                Get Sharable Link
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;">
                                                <i data-feather="edit-3"></i>
                                                Rename
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;">
                                                <i data-feather="download"></i>
                                                Download
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="javascript:;">
                                                <i data-feather="trash-2"></i>
                                                Remove
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-sm-flex justify-content-between align-items-center text-center">
                <span class="fs-14">Showing 1 To 5 Of 20 Entries</span>
                <nav aria-label="Page navigation example">
                    <ul class="pagination mb-0 mt-3 mt-sm-0 justify-content-center">
                        <li class="page-item">
                            <a class="page-link icon" href="members-list.html" aria-label="Previous">
                                <i data-feather="arrow-left"></i>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link active" href="members-list.html">1</a></li>
                        <li class="page-item"><a class="page-link" href="members-list.html">2</a></li>
                        <li class="page-item"><a class="page-link" href="members-list.html">3</a></li>
                        <li class="page-item">
                            <a class="page-link icon" href="members-list.html" aria-label="Next">
                                <i data-feather="arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php
include("../../includes/footer.php");

?>