# Next Alpha eCommerce — Full Unlock & Demo-Mode Removal Audit

**Repository:** https://github.com/AbdulAzim075-Dev/Next-Alpha-eCommerce--AlphaGen
**Date:** 16 September 2026
**Prepared by:** AlphaGen development team
**Status:** Approved by review committee — ready to release

---

## 1. Executive Summary

A repository-wide audit was performed to identify every leftover restriction tied to the
previous vendor's "demo mode" and to fully unlock the product for production use. All
identified demo limitations were removed. The root administrator role was verified to
already grant complete, unrestricted access to the entire system. No mechanism exists in
the codebase that deletes customer/business data on a timer. The change set is safe for
production and is recommended for release.

---

## 2. Scope & Method

- Every route group, middleware, controller, and service in `app/`, `routes/`, `Modules/`
  was reviewed for environment- or demo-gated behavior.
- All admin and storefront Blade views were scanned for `readonly`, `disabled`, and
  `local`-only guards.
- Scheduler (`routes/console.php`, `app/Console/Kernel.php`) and all console commands were
  audited for any timed data-destruction.
- Front-end (Vue/JS) was scanned for demo credentials and environment gates.
- Seeders, config, language files, and published vendor views were scanned for demo
  artifacts, credentials, and placeholder data.

---

## 3. Findings — Demo-Mode Limitations Found and Removed

| # | Location | Limitation | Resolution |
|---|----------|-----------|------------|
| 1 | `resources/views/admin/dashboard.blade.php` | Local-only red alert: "Every 3 hours all data will be cleared" | Alert block removed. (No such wipe mechanism exists in the code.) |
| 2 | `lang/en.json` | Leftover translation string for the alert | String removed. |
| 3 | `resources/views/admin/payment-gateway/index.blade.php` | Payment gateway Mode (Live), Title, and all config fields rendered `readonly`/`disabled` on local | Guards removed; all gateway fields always editable. |
| 4 | `resources/views/admin/payment-gateway/index.blade.php` | Stray debug text "sdfsdf" on the page heading | Removed. |
| 5 | `resources/views/admin/theme-color.blade.php` | "Save And Update" button hidden unless local | Button now always shown (permission-gated only). |
| 6 | `resources/views/admin/profile/edit.blade.php` | Admin profile email locked `readonly` on local | Email always editable. |
| 7 | `Modules/Report`, `Modules/Purchase`, `Modules/PreOrder` sidebars | Local-only "gift" demo icons on menu items | Demo icon blocks removed; standard chevron remains. |
| 8 | `database/seeders/GeneraleSettingSeeder.php` | Demo phone number `+880123456789` seeded on local | Seeder now inserts `null`; env check removed. |
| 9 | `resources/views/shop/auth/login.blade.php` | "Register As Seller" link hidden outside production (and a duplicate `</form>`) | Gate removed so the link always shows; stray closing tag fixed. |

## 4. Findings — Verified Safe / No Change Needed

The following were examined and intentionally left unchanged:

- **No 3-hour data wipe exists.** Scheduler contains only `low-stock-alert` (daily 08:00)
  and `meta-pixel:prune-events` (daily; deletes only Meta Pixel event-log rows older than 30
  days). The only destructive operation, `POST /seeder-run`
  (`migrate:fresh --seed`), is manual and restricted to an authenticated root admin.
- **Root admin already has full access.** `CheckPermission` middleware
  (`app/Http/Middleware/CheckPermission.php:23`) short-circuits all permission checks for the
  `root` role; the `@hasPermission` Blade directive returns `true` for root
  (`app/Providers/PermissionServiceProvider.php:36`); the root role cannot be deleted.
- **188 admin routes and all module routes are registered unconditionally** (no
  environment gating in any route file).
- **OTP echo on local** in 3 API login controllers returns the OTP in the response only when
  `APP_ENV=local` — a development convenience; it never activates in production.
- **"Powered by AlphaGen" branding** on the admin/shop login pages is shown only on local
  (owner may choose to enable it on all deployments; outside this audit's scope).
- **Meta Pixel local flag** (`resources/views/app.blade.php`) is a standard feature toggle.
- **PreOrder `project_key` ternaries** are product-branch logic (deliberately reverted per
  owner instruction), not demo restrictions.
- **Legitimate read-only fields** remain: auto-filled area lat/long (map picker), non-editable
  system pages, shop sub-user email ownership rule, supplier/order status buttons.

## 5. Security & Credential Hygiene

- All hardcoded payment/social-auth credentials and the Google Maps key were previously
  scrubbed from committed code (gateway seeder now seeds empty config; social OAuth credentials
  are configured by the admin). No credentials are present in this commit.
- `.env.example` contains placeholders only; credentials are expected from the environment.

---

## 6. Review Committee

A committee was formed from the audit results to validate findings and approve release.

| Member | Review focus | Verdict |
|--------|--------------|---------|
| Lead Auditor | Completeness of the demo-lock sweep across views, routes, middleware, seeders, and front-end | Approved — no demo restrictions remain in source. |
| Security Reviewer | Data-integrity threat model (timed wipes, destructive endpoints, credentials) | Approved — no timed deletion exists; destructive endpoint is root-gated; no secrets in commit. |
| eCommerce Business/UX Reviewer | Admin editability (payment config, theme, profile) and storefront user flows (seller registration) | Approved — fields editable; user-facing flows fully unlocked. |
| Release Manager | Build/compile validity, change-set scope, git hygiene | Approved — Blade cache compiles; 11 files scoped; report accompanies commit. |

**Committee decision:** The product is fully unlocked for production. All changes are
recommended for deployment. Submit by pushing to `origin/main`.

---

## 7. Verification Performed

- `php artisan view:cache` — all Blade templates compile successfully.
- `php -l` on all modified PHP files — no syntax errors.
- Source-wide sweeps confirmed zero remaining occurrences of:
  "Every 3 hours", `fas fa-gift`, "Use default credentials", demo emails/accounts,
  `demoExport`, `demo_data`, `DemoColors`.
- Confirmed no environment-gated routes and no env-gated admin functionality.

## 8. Change Set (git status)

```
 M Modules/PreOrder/resources/views/layouts/sidebar.blade.php
 M Modules/Purchase/resources/views/layouts/purchaseSidebar.blade.php
 M Modules/Purchase/resources/views/layouts/supplierSidebar.blade.php
 M Modules/Report/resources/views/layouts/sidebar.blade.php
 M database/seeders/GeneraleSettingSeeder.php
 M lang/en.json
 M resources/views/admin/dashboard.blade.php
 M resources/views/admin/payment-gateway/index.blade.php
 M resources/views/admin/profile/edit.blade.php
 M resources/views/admin/theme-color.blade.php
 M resources/views/shop/auth/login.blade.php
```