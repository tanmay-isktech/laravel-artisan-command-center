<!doctype html>
<html lang="en">
    <head>
        <title>Command Center</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{url('terminal.ico')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/spinkit@2.0.1/spinkit.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.min.css">
        <style>
            @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css");
            .container-custom-css{ position: relative; }
            .artisan-heading .artisan-heading-icon, .artisan-heading .artisan-heading-text{ display: inline-block; }
            .artisan-heading .artisan-heading-icon i{ font-size: 55px; color: #323a42; }
            .artisan-heading .artisan-heading-text h1{ font-size: 25px; color: #323a42; }
            .artisan-heading .artisan-heading-text small{ color: #76838f; margin-left: 2px; }
            .btn-outline-primary{ border-color: #549DEA; color: #549DEA; }
            .btn-outline-primary:hover, .btn-outline-primary:focus-visible{  border-color: #549DEA !important; background: #549DEA !important; color: #fff !important; }
            .btn-outline-primary:focus-visible{ box-shadow: unset !important;  }
            .message{ position: sticky; top: 10px; z-index: 99; height: 300px; background: #000000de; width: 100%; padding: 10px; margin-bottom: 25px; border-radius: 5px; font-size: 15px; }
            .art-out{ user-select: none; width: 100%; display: block; color: #98cb00; }
            .cls-out{ user-select: none; color: #fff; position: absolute; right: 8px; top: 8px; font-size: 12px; padding: 5px 8px; background: #8080802e;   border-radius: 5px; cursor: pointer; letter-spacing: 0.07rem; transition: 0.5s; }
            .cls-out:hover{ background: #323a42; }
            .command-out-div { margin-top: 15px; margin-bottom: 0; height: 242px; overflow: auto; }
            .command-out{ color: #fff; overflow: unset; }
            .command{ user-select: none; position: relative; padding: 10px; background: #549DEA1A; border-radius: 5px; border: 1px solid #323a4217; height: 100%; padding-bottom: 52px; }
            .command .command-icon{ position: absolute; top: 0px; right: 5px; font-size: 18px; color: #323a42; }
            .command code, .command small, .command button{ display: block; }
            .command code{ color: #549DEA; font-size: 12px; }
            .command small{ color: #76838f; font-size: 13px; }
            .cmd_form { position: absolute; left: 10px; right: 10px; bottom: 10px; }
            .cmd_form input, .cmd_form button{ font-size: 12px !important; }
            .cmd_form input.form-control:focus{ box-shadow: unset; }
            .cmd_form button{ border-top-right-radius: 5px !important; border-bottom-right-radius: 5px !important; }
            .back-to-top{ position: fixed; bottom: 0px; right: 10px; font-size: 25px; opacity: 0; visibility: hidden; transition: background-color .3s, color .3s, opacity .5s, visibility .5s; color: #549DEA5C; z-index: 999; }
            .back-to-top:hover{ color: #549DEA; }
            .back-to-top.show { opacity: 1; visibility: visible; }
            .sk-wave-rect { background: #fff; }
        </style>
    </head>
    <body>
        <main class="position-relative">
            <div class="container container-custom-css pt-2 pb-4">
                <div class="artisan-heading">
                    <div class="artisan-heading-icon">
                        <i class="bi bi-terminal-fill"></i>
                    </div>
                    <div class="artisan-heading-text ms-1">
                        <h1 class="mb-0">Command Center</h1> <small>Run Artisan Commands from Laravel.</small>
                    </div>
                </div>
                <div class="message">
                    <span class="art-out">Artisan Command Output :</span>
                    <span class="cls-out-command cls-out"><i class="bi bi-x-lg"></i> Clear Output</span>
                    <div class="command-out-div">
                        <pre class="command-out"></pre>
                    </div>
                </div>

                {{-- START: COMMAND ROW --}}
                <div class="row">
                    <div class="col-12">
                        <h4>Basic</h4>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan list</code>
                            <small class="mt-2">List commands</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="list">
                                    <button type="submit" id="list" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="list">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan help</code>
                            <small class="mt-2">Display help for a command</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="help">
                                    <button type="submit" id="help" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="help">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan about</code>
                            <small class="mt-2">Display basic information about your application</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="about">
                                    <button type="submit" id="about" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="about">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan env</code>
                            <small class="mt-2">Display the current framework environment</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="env">
                                    <button type="submit" id="env" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="env">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan inspire</code>
                            <small class="mt-2">Display an inspiring quote</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="inspire">
                                    <button type="submit" id="inspire" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="inspire">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <h4>Optimize & Cache</h4>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan optimize</code>
                            <small class="mt-2">Cache the framework bootstrap files</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="optimize">
                                    <button type="submit" id="optimize" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="optimize">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan optimize:clear</code>
                            <small class="mt-2">Remove the cached bootstrap files</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="optimize:clear">
                                    <button type="submit" id="optimize:clear" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="optimize:clear">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan auth:clear-resets</code>
                            <small class="mt-2">Flush expired password reset tokens</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="auth-clear-resets">
                                    <button type="submit" id="auth-clear-resets" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="auth:clear-resets">
                                </div>
                            </form>
                        </div>
                    </div>
             
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan cache:clear</code>
                            <small class="mt-2">Flush the application cache</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="cache-clear">
                                    <button type="submit" id="cache-clear" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="cache:clear">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan cache:forget</code>
                            <small class="mt-2">Remove an item from the cache</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="cache-forget">
                                    <button type="submit" id="cache-forget" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="cache:forget">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan config:cache</code>
                            <small class="mt-2">Create a cache file for faster configuration</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="config-cache">
                                    <button type="submit" id="config-cache" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="config:cache">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan config:clear</code>
                            <small class="mt-2">Remove the configuration cache file</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="config-clear">
                                    <button type="submit" id="config-clear" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="config:clear">
                                </div>
                            </form>
                        </div>
                    </div>

                     <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan route:cache</code>
                            <small class="mt-2">Create a route cache file for faster route</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="route-cache">
                                    <button type="submit" id="route-cache" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="route:cache">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan route:clear</code>
                            <small class="mt-2">Remove the route cache file</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="route-clear">
                                    <button type="submit" id="route-clear" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="route:clear">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan view:cache</code>
                            <small class="mt-2">Compile all Blade templates</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="view-cache">
                                    <button type="submit" id="view-cache" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="view:cache">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan view:clear</code>
                            <small class="mt-2">Clear all compiled view files</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="view-clear">
                                    <button type="submit" id="view-clear" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="view:clear">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <h4>Make</h4>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan make:middleware</code>
                            <small class="mt-2">Create a new middleware class</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="make-middleware" required>
                                    <button type="submit" id="make-middleware" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="make:middleware">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan make:migration</code>
                            <small class="mt-2">Create a new migration file</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="make-migration" required>
                                    <button type="submit" id="make-migration" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="make:migration">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan make:model</code>
                            <small class="mt-2">Create a new Eloquent model class</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="make-model" required>
                                    <button type="submit" id="make-model" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="make:model">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan make:controller</code>
                            <small class="mt-2">Create a new controller class</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="make-controller" required>
                                    <button type="submit" id="make-controller" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="make:controller">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <h4>Migration</h4>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate</code>
                            <small class="mt-2">Run the database migrations</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate">
                                    <button type="submit" id="migrate" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:generate</code>
                            <small class="mt-2">Make migration files from DB</small>
                            <a class="command-icon" href="https://github.com/kitloong/laravel-migrations-generator" target="_blank" title="Require (kitloong/laravel-migrations-generator) package! Click to show package info."><i class="bi bi-info-circle"></i></a>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-generate">
                                    <button type="submit" id="migrate-generate" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:generate">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:fresh</code>
                            <small class="mt-2">Drop all tables and re-run all migrations</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-fresh">
                                    <button type="submit" id="migrate-fresh" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:fresh">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:install</code>
                            <small class="mt-2">Create the migration repository</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-install">
                                    <button type="submit" id="migrate-install" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:install">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:refresh</code>
                            <small class="mt-2">Reset and re-run all migrations</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-refresh">
                                    <button type="submit" id="migrate-refresh" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:refresh">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:reset</code>
                            <small class="mt-2">Rollback all database migrations</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-reset">
                                    <button type="submit" id="migrate-reset" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:reset">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:rollback</code>
                            <small class="mt-2">Rollback the last database migration</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-rollback">
                                    <button type="submit" id="migrate-rollback" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:rollback">
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan migrate:status</code>
                            <small class="mt-2">Show the status of each migration</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="migrate-status">
                                    <button type="submit" id="migrate-status" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="migrate:status">
                                </div>
                            </form>
                        </div>
                    </div>

                    
                    <div class="col-12 mt-3">
                        <h4>Database</h4>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan db:monitor</code>
                            <small class="mt-2">Monitor the number of connections on the specified database</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="db-monitor">
                                    <button type="submit" id="db-monitor" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="db:monitor">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan db:seed</code>
                            <small class="mt-2">Seed the database with records</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="db-seed">
                                    <button type="submit" id="db-seed" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="db:seed">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan db:show</code>
                            <small class="mt-2">Display information about the given database</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="db-show">
                                    <button type="submit" id="db-show" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="db:show">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan db:table</code>
                            <small class="mt-2">Display information about the given database table</small>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="db-table" required>
                                    <button type="submit" id="db-table" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="db:table">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-4 col-md-6 mb-lg-0 mb-xl-4 mb-lg-4 mb-md-4 mb-3">
                        <div class="command">
                            <code>php artisan iseed</code>
                            <small class="mt-2">Generate a new seed file based on data from the existing database table.</small>
                            <a class="command-icon" href="https://github.com/orangehill/iseed" target="_blank" title="Require (orangehill/iseed) package! Click to show package info."><i class="bi bi-info-circle"></i></a>
                            <form class="cmd_form" action="#">
                                <div class="input-group command-fields mt-2">
                                    <input type="text" name="args" class="form-control" placeholder="Additional Arguments?" aria-describedby="iseed" required>
                                    <button type="submit" id="iseed" class="commands btn btn-sm btn-outline-primary">Execute</button>
                                    <input type="hidden" name="command" value="iseed">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- END: COMMAND ROW --}}

                <span class="back-to-top" title="Back to Top"><i class="bi bi-arrow-up-square"></i></span>
            </div>
        </main>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>
        <script>
            $.ajaxSetup({headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}});
            $('.cls-out-command').bind('click',function(){ $('.command-out').text(''); });

            // Sweet Aler : JS ---------------------------
            function sweetAlert(title, html, icon){
                let error_icon = '';
                switch(icon){
                    case 'danger': error_icon = 'error'; break;
                    case 'success': error_icon = 'success'; break;
                    case 'warning': error_icon = 'warning'; break;
                }
                Swal.fire({
                    title: title,
                    html: html,
                    icon: error_icon,
                    customClass: { confirmButton: "btn btn-"+icon+" waves-effect waves-light" }
                })
            }

            // Block UI : JS ---------------------------
            function blockCustomUI(status){
                switch(status){
                    case 1:
                        $.blockUI({
                            message: '<div class="sk-wave mx-auto"><div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div> <div class="sk-rect sk-wave-rect"></div></div>',
                            css: { backgroundColor: "transparent", border: "0" },
                            overlayCSS: { opacity: .5 },
                            baseZ: 999999, 
                        });
                    break;
                    case 0: $.unblockUI(); break;
                }
            }

            // Execute Command : JS ---------------------------
            $('.cmd_form').submit(function(event) {
                event.preventDefault();
                let formData = new FormData(this);
                $.ajax({
                    type:"POST",
                    url: "{{route('command-center')}}",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(res){
                        $('.command-out').text(res.response);
                    },error: function(res){
                        switch(res.status){
                            case 419: sweetAlert('', 'Please refresh the page and try again!', 'warning'); break;
                            default: sweetAlert('', res.responseJSON.message, 'danger');
                        }
                    }
                });
            });

            // Block UI on Ajax Call : JS ---------------------------
            $.ajaxSetup({
                beforeSend: function(){ blockCustomUI(1); },
                complete: function(){ blockCustomUI(0); }
            });

            // Scroll : JS ---------------------------
            var btt = $('.back-to-top');
            $(window).scroll(function() {
                $(window).scrollTop() > 100 ? btt.addClass('show') : btt.removeClass('show');
            });

            btt.on('click', function(e){
                e.preventDefault();
                $('html, body').animate({scrollTop:0}, '100');
            });
        </script>
    </body>
</html>