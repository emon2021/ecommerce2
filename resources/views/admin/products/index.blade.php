<div class="checkbox-wrapper-34">
    <input class='tgl tgl-ios' id='toggle-34' type='checkbox'>
    <label class='tgl-btn' for='toggle-34'></label>
</div>
  
  <style>
    .checkbox-wrapper-34 {
      --blue: #0D7EFF;
      --g08: #E1E5EB;
      --g04: #848ea1;
    }
  
    .checkbox-wrapper-34 .tgl {
      display: none;
    }
    .checkbox-wrapper-34 .tgl,
    .checkbox-wrapper-34 .tgl:after,
    .checkbox-wrapper-34 .tgl:before,
    .checkbox-wrapper-34 .tgl *,
    .checkbox-wrapper-34 .tgl *:after,
    .checkbox-wrapper-34 .tgl *:before,
    .checkbox-wrapper-34 .tgl + .tgl-btn {
      box-sizing: border-box;
    }
    .checkbox-wrapper-34 .tgl::selection,
    .checkbox-wrapper-34 .tgl:after::selection,
    .checkbox-wrapper-34 .tgl:before::selection,
    .checkbox-wrapper-34 .tgl *::selection,
    .checkbox-wrapper-34 .tgl *:after::selection,
    .checkbox-wrapper-34 .tgl *:before::selection,
    .checkbox-wrapper-34 .tgl + .tgl-btn::selection {
      background: none;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn {
      outline: 0;
      display: block;
      width: 57px;
      height: 27px;
      position: relative;
      cursor: pointer;
      user-select: none;
      font-size: 12px;
      font-weight: 400;
      color: #fff;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:after,
    .checkbox-wrapper-34 .tgl + .tgl-btn:before {
      position: relative;
      display: block;
      content: "";
      width: 44%;
      height: 100%;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:after {
      left: 0;
    }
    .checkbox-wrapper-34 .tgl + .tgl-btn:before {
      display: inline;
      position: absolute;
      top: 7px;
    }
    .checkbox-wrapper-34 .tgl:checked + .tgl-btn:after {
      left: 56.5%;
    }
  
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn {
      background: var(--g08);
      border-radius: 20rem;
      padding: 2px;
      transition: all 0.4s ease;
      box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:after {
      border-radius: 2em;
      background: #fff;
      transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275), padding 0.3s ease, margin 0.3s ease;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.2);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:before {
      content: "No";
      left: 28px;
      color: var(--g04);
      transition: left 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:active {
      box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios + .tgl-btn:active:after {
      padding-right: 0.4em;
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn {
      background: var(--blue);
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:active {
      box-shadow: inset 0 0 0 30px rgba(0, 0, 0, 0.1);
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:active:after {
      margin-left: -0.4em;
    }
    .checkbox-wrapper-34 .tgl-ios:checked + .tgl-btn:before {
      content: "Yes";
      left: 4px;
      color: #fff;
    }
  </style>
  