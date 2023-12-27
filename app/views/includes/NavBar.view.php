<?php
                        $role = "User";
                        if ($role == "User") {
                            echo '<li>
                               <a href="'. ROOT .'">
                                  <i class="bx bx-grid-alt"></i>
                                  <span class="links_name">Dashboard</span>
                                </a>
                                <span class="tooltip">Dashboard</span>
                              </li>
                              <li>
                                <a href="' . ROOT . '/product_stock.php">
                                  <i class="bx bx-cake"></i>
                                  <span class="links_name">Products</span>
                                </a>
                                <span class="tooltip">Products</span>
                              </li> 
                              <li>
                                <a href="process.php">
                                  <i class="bx bx-pie-chart-alt-2"></i>
                                  <span class="links_name">Process</span>
                                </a>
                                <span class="tooltip">Process</span>
                              </li>
                              <li>
                                <a href="export.php">
                                  <i class="bx bxs-plane-alt"></i>
                                  <span class="links_name">Exports</span>
                                </a>
                                <span class="tooltip">Exports</span>
                              </li>
                              <li>
                                <a href="recipes.php">
                                  <i class="bx bx-food-menu"></i>
                                  <span class="links_name">Recipes</span>
                                </a>
                                <span class="tooltip">Recipes</span>
                              </li>
                              <li>
                                <a href="complaint.php">
                                  <i class="bx bx-message-alt-detail"></i>
                                  <span class="links_name">Complains</span>
                                </a>
                                <span class="tooltip">Complains</span>
                              </li>
                              <li>
                                <a href="user.php#aboutus">
                                <i class="bx bx-info-circle"></i>
                                  <span class="links_name">About Us</span>
                                </a>
                                <span class="tooltip">About Us</span>
                              </li>
                              <li>
                                <a href="user.php#contactus">
                                  <i class="bx bxs-phone-call"></i>
                                  <span class="links_name">Contact Us</span>
                                </a>
                                <span class="tooltip">Contact Us</span>
                              </li>';
                        } elseif ($role == "Employee") {
                          echo '
                          <li>
                          <a href="employee_profile.php">
                            <i class="bx bx-user"></i>
                            <span class="links_name">Profile</span>
                          </a>
                          <span class="tooltip">Profile</span>
                        </li>
                        <li>
                        <a href="product_stock.php">
                        <i class="bx bx-book-open"></i>
                          <span class="links_name">Stocks</span>
                        </a>
                        <span class="tooltip">Stocks</span>
                      </li>
                      <li>
                      <a href="delivery_progress.php">
                      <i class="bx bx-cake"></i>
                        <span class="links_name">Orders</span>
                      </a>
                      <span class="tooltip">Orders</span>
                    </li>';
                        } elseif ($role == "Manager") {
                            echo '
                            <li>
                            <a href="manager_profile.php">
                              <i class="bx bxs-user-circle"></i>
                              <span class="links_name">Profile</span>
                            </a>
                            <span class="tooltip">Profile</span>
                          </li>
                          <li>
                          <a href="#">
                            <i class="bx bx-cake"></i>
                            <span class="links_name">Products</span>
                          </a>
                          <span class="tooltip">Products</span>
                        </li>
                        <li>
                        <a href="order_history.php">
                          <i class="bx bx-notepad"></i>
                          <span class="links_name">Order History</span>
                        </a>
                        <span class="tooltip">Order History</span>
                      </li>
                      <li>
                                <a href="#">
                                  <i class="bx bx-user"></i>
                                  <span class="links_name">Employees</span>
                                </a>
                                <span class="tooltip">Employees</span>
                              </li>
                              <li>
                              <a href="#">
                                <i class="bx bxs-user"></i>
                                <span class="links_name">Deliverers</span>
                              </a>
                              <span class="tooltip">Deliverers</span>
                            </li>
                            <li>
                                <a href="view_complains.php">
                                  <i class="bx bxs-calendar-minus"></i>
                                  <span class="links_name">Complains</span>
                                </a>
                                <span class="tooltip">Complains</span>
                              </li>
                              <li>
                              <a href="#">
                                <i class="bx bx-user-pin"></i>
                                <span class="links_name">Feedbacks</span>
                              </a>
                              <span class="tooltip">Feedbacks</span>
                            </li>
                            <li>
                                <a href="#">
                                  <i class="bx bx-food-menu"></i>
                                  <span class="links_name">Reports</span>
                                </a>
                                <span class="tooltip">reports</span>
                              </li>
                              <li>
                              <a href="branch_details.php">
                                <i class="bx bxs-business"></i>
                                <span class="links_name">Branch Details</span>
                              </a>
                              <span class="tooltip">Branch Details</span>
                            </li>
                            <li>
                                <a href="#">
                                  <i class="bx bxs-user-rectangle"></i>
                                  <span class="links_name">Customers</span>
                                </a>
                                <span class="tooltip">Customers</span>
                              </li>';
                        } elseif ($role == "Admin") {
                            echo '
                            <li>
                                <a href="#">
                                  <i class="bx bx-message-alt-detail"></i>
                                  <span class="links_name">Customers</span>
                                </a>
                                <span class="tooltip">Customers</span>
                              </li>
                              <li>
                              <a href="#">
                                <i class="bx bx-message-alt-detail"></i>
                                <span class="links_name">Managers</span>
                              </a>
                              <span class="tooltip">Managers</span>
                            </li>
                            <li>
                                <a href="#">
                                  <i class="bx bx-message-alt-detail"></i>
                                  <span class="links_name">Employess</span>
                                </a>
                                <span class="tooltip">Employees</span>
                              </li>
                              <li>
                              <a href="#">
                                <i class="bx bx-message-alt-detail"></i>
                                <span class="links_name">Deliverers</span>
                              </a>
                              <span class="tooltip">Deliverers</span>
                            </li>
                            <li>
                                <a href="#">
                                  <i class="bx bx-cake"></i>
                                  <span class="links_name">Products</span>
                                </a>
                                <span class="tooltip">Products</span>
                              </li>
                              <li>
                              <a href="#">
                                <i class="bx bx-cake"></i>
                                <span class="links_name">Branches</span>
                              </a>
                              <span class="tooltip">Branches</span>
                            </li>
                            <li>
                                <a href="#">
                                  <i class="bx bx-cake"></i>
                                  <span class="links_name">Advertisement</span>
                                </a>
                                <span class="tooltip">Advertisement</span>
                              </li>';
                        } elseif ($role == "Deliverer") {
                          echo '
                          <li>
                              <a href="profile.php">
                                <i class="bx bx-user"></i>
                                <span class="links_name">Profile</span>
                              </a>
                              <span class="tooltip">Profile</span>
                            </li>
                            <li>
                            <a href="assign.php">
                            <i class="bx bx-clipboard"></i>
                              <span class="links_name">Assign Orders</span>
                            </a>
                            <span class="tooltip">Assign Orders</span>
                          </li>';
                        }
                        ?>