<?php

$role = $data['role'];
if ($role == "User") {
  echo '<li>
                               <a href="' . ROOT . '">
                                  <i class="bx bx-grid-alt"></i>
                                  <span class="links_name">Home</span>
                                </a>
                                <span class="tooltip">Home</span>
                              </li>
                              <li>
                                <a href="' . ROOT . '/products">
                                  <i class="bx bx-cake"></i>
                                  <span class="links_name">Products</span>
                                </a>
                                <span class="tooltip">Products</span>
                              </li> 
                              <li>
                              <a href="' . (Auth::is_customer() ? ROOT . '/order_history' : ROOT . '/login') . '">
                                  <i class="bx bx-notepad"></i>
                                  <span class="links_name">Order History</span>
                                </a>
                                <span class="tooltip">Order History</span>
                              </li> 
                              <li>
                                <a href="' . ROOT . '/process">
                                  <i class="bx bx-pie-chart-alt-2"></i>
                                  <span class="links_name">Process</span>
                                </a>
                                <span class="tooltip">Process</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/recipes">
                                  <i class="bx bx-food-menu"></i>
                                  <span class="links_name">Recipes</span>
                                </a>
                                <span class="tooltip">Recipes</span>
                              </li>
                              <li>
                                <a href="' . ROOT . '/complaint">
                                  <i class="bx bx-message-alt-detail"></i>
                                  <span class="links_name">Complains</span>
                                </a>
                                <span class="tooltip">Complains</span>
                              </li>
                              <li>
                                <a href="' . ROOT . '#aboutus">
                                <i class="bx bx-info-circle"></i>
                                  <span class="links_name">About Us</span>
                                </a>
                                <span class="tooltip">About Us</span>
                              </li>
                              ';
} elseif ($role == "Employee") {
  echo '
                          <li>
                               <a href="Emp_dashboard">
                                  <i class="bx bx-grid-alt"></i>
                                  <span class="links_name">Dashboard</span>
                                </a>
                                <span class="tooltip">Dashboard</span>
                          </li>
                          <li>
                          <a href="Emp_profile">
                            <i class="bx bx-user"></i>
                            <span class="links_name">Profile</span>
                          </a>
                          <span class="tooltip">Profile</span>
                        </li>
                        <li>
                        <a href="Emp_productStock">
                        <i class="bx bx-book-open"></i>
                          <span class="links_name">Stocks</span>
                        </a>
                        <span class="tooltip">Stocks</span>
                      </li>
                      <li>
                      <a href="Emp_progress">
                      <i class="bx bx-cake"></i>
                        <span class="links_name">Orders</span>
                      </a>
                      <span class="tooltip">Orders</span>
                    </li>';
} elseif ($role == "Manager") {
  echo '
                            <li>
                            <a href="' . ROOT . '/Manager_profile">
                              <i class="bx bxs-user-circle"></i>
                              <span class="links_name">Profile</span>
                            </a>
                            <span class="tooltip">Profile</span>
                          </li>
                          <li>
                          <a href="' . ROOT . '/Manager_view_pro">
                            <i class="bx bx-cake"></i>
                            <span class="links_name">Products</span>
                          </a>
                          <span class="tooltip">Products</span>
                        </li>
                        <li>
                        <a href="' . ROOT . '/Man_order_his">
                          <i class="bx bx-notepad"></i>
                          <span class="links_name">Order History</span>
                        </a>
                        <span class="tooltip">Order History</span>
                      </li>
                      <li>
                                <a href="' . ROOT . '/Manager_employee">
                                  <i class="bx bx-user"></i>
                                  <span class="links_name">Employees</span>
                                </a>
                                <span class="tooltip">Employees</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/Manager_deliverer">
                                <i class="bx bxs-user"></i>
                                <span class="links_name">Deliverers</span>
                              </a>
                              <span class="tooltip">Deliverers</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/Man_complains">
                                  <i class="bx bxs-calendar-minus"></i>
                                  <span class="links_name">Complains</span>
                                </a>
                                <span class="tooltip">Complains</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/Man_view_feed">
                                <i class="bx bx-user-pin"></i>
                                <span class="links_name">Feedbacks</span>
                              </a>
                              <span class="tooltip">Feedbacks</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/manager_report">
                                  <i class="bx bx-food-menu"></i>
                                  <span class="links_name">Reports</span>
                                </a>
                                <span class="tooltip">reports</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/Manager_branches">
                                <i class="bx bxs-business"></i>
                                <span class="links_name">Branch Details</span>
                              </a>
                              <span class="tooltip">Branch Details</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/Manager_customer">
                                  <i class="bx bxs-user-rectangle"></i>
                                  <span class="links_name">Customers</span>
                                </a>
                                <span class="tooltip">Customers</span>
                              </li>';
} elseif ($role == "Admin") {
  echo '
                            <li>
                                <a href="' . ROOT . '/admin_dashboard">
                                  <i class="bx bx-food-menu"></i>
                                  <span class="links_name">Dashboard</span>
                                </a>
                                <span class="tooltip">Dashboard</span>
                              </li>
                              <li>
                            
                              <span class="tooltip">Profile</span>
                            </li>
                            <li>
                              <a href="' . ROOT . '/addemployee">
                                <i class="bx bxs-user-rectangle"></i>
                                <span class="links_name">Add Employee</span>
                              </a>
                              <span class="tooltip">Add Employee</span>
                            </li>
                              <li>
                              <a href="' . ROOT . '/admin_managers">
                                <i class="bx bxs-user"></i>
                                <span class="links_name">Managers</span>
                              </a>
                              <span class="tooltip">Managers</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/admin_employees">
                                  <i class="bx bx-user"></i>
                                  <span class="links_name">Employess</span>
                                </a>
                                <span class="tooltip">Employees</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/admin_deliverers">
                                <i class="bx bxs-user"></i>
                                <span class="links_name">Deliverers</span>
                              </a>
                              <span class="tooltip">Deliverers</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/admin_customers">
                                  <i class="bx bxs-user-rectangle"></i>
                                  <span class="links_name">Customers</span>
                                </a>
                                <span class="tooltip">Customers</span>
                              </li>
                            <li>
                                <a href="' . ROOT . '/admin_products">
                                  <i class="bx bx-cake"></i>
                                  <span class="links_name">Products</span>
                                </a>
                                <span class="tooltip">Products</span>
                              </li>
                              <li>
                              <a href="' . ROOT . '/admin_branches">
                                <i class="bx bxs-business"></i>
                                <span class="links_name">Branches</span>
                              </a>
                              <span class="tooltip">Branches</span>
                            </li>
                            <li>
                                <a href="' . ROOT . '/admin_advertisements">
                                  <i class="bx bx-notepad"></i>
                                  <span class="links_name">Advertisement</span>
                                </a>
                                <span class="tooltip">Advertisement</span>
                              </li>
                            ';
} elseif ($role == "Deliverer") {
  echo '
                          <li>
                              <a href="Deliverer_profile">
                                <i class="bx bx-user"></i>
                                <span class="links_name">Profile</span>
                              </a>
                              <span class="tooltip">Profile</span>
                            </li>
                            <li>
                            <a href="Deliverer_assign">
                            <i class="bx bx-clipboard"></i>
                              <span class="links_name">Assign Orders</span>
                            </a>
                            <span class="tooltip">Assign Orders</span>
                          </li>';
}
